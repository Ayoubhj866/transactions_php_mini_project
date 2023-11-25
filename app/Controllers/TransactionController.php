<?php

namespace App\Controllers;

use App\Abstracts\Crud;
use App\Core\Alert;
use App\Core\View;
use App\Helpers\CsvHelper;
use App\Models\Transaction;

class TransactionController
{

    /**
     * Get the list of transactions
     *
     * @return void
     */
    public function index(): View
    {
        //get all transaction
        $transaction = (new Transaction)->readAll();

        return View::make("transactions/index", $transaction);
    }

    /**
     * Get page to create new transaction
     *
     * @return View
     */
    public function create(): View
    {
        return View::make("transactions/create", []);
    }

    /**
     * Store single transaction to database
     *
     * @return void
     */
    public function store()
    {
        $trans = new Transaction();

        if (isset($_FILES['csv_transactions'])) {
            //save transactions from csv file
            self::storeFromeCsvFile($trans) ;
        }
        else if($_SERVER['REQUEST_METHOD'] === "POST") {
            //store transaction from form
            self::storeFromForm($trans , $_POST) ;
            
        }
    }


    /**
     * Store transactions from csv file
     *
     * @param Transaction $trans
     * @return Transaction
     */
    public static function storeFromeCsvFile(Transaction $trans) : Transaction
    {
        \dump($_FILES['csv_transactions']);
        $file = $_FILES['csv_transactions']['tmp_name'];

        if ($file !== "") {
            //csv handler
            $transactions = CsvHelper::csvHandler($file);
            $result = false;
            $count = 0;
            if (\is_array($transactions)) {
                foreach ($transactions as $transaction) {
                    if ($trans->create($transaction)) {
                        $count++;
                    } else {
                        $count--;
                    }
                }
            }
        }

        
        else {
            Alert::make("PLease select an valid csv file to save transactions", "error");
            header("Location: /transactions/create");
            die ;
        }
        
        if ($count > 0) {
            Alert::make("$count transactions are created succesfully ", "success");
            header("Location: /transactions/create");
            die;
        } else {
            Alert::make("Transactions cannot stored ! ", "error");
            header("Location: /transactions/create");
            die;
        }

        //error 
        Alert::make("Invalid csv file, or incopatible collumns of csv file", "error");
        header("Location: /transactions/create");
        die;
    }

    /**
     * Save transaction from form
     *
     * @param Transaction $trans
     * @return Transaction
     */
    public static function storeFromForm(Transaction $trans , array $data)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($trans->create($data)) {
                Alert::make("Transaction created succesffuly" , "success") ;
                \header("Location: /transactions");
                die;
            }
            else {
                Alert::make("Transaction can't created succesffyly") ;
                $_SESSION['registredData']= $data ;
                header("Location: /transactions/create");
                die ;
            }
        }
    }
}
