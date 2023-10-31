<?php 
namespace App\Controllers ;

use App\Abstracts\Crud;
use App\Core\Alert;
use App\Core\View;
use App\Models\Transaction;

class TransactionController
{

    /**
     * Get the transactions page
     *
     * @return void
     */
    public function index() : View
    {
        //get all transaction
        $transaction = (new Transaction) -> readAll() ;
        
        return View::make("transactions/index" , $transaction)  ;
    }

    public function create() : View
    {
       
        return View::make("transactions/create" , []) ;
    }

}