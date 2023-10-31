<?php 
namespace App\Controllers ;

use App\Abstracts\Crud;
use App\Core\Alert;
use App\Core\View;
use App\Models\Transaction;

class TransactionController
{

    public function index()
    {
        //get all transaction
        $transaction = (new Transaction) -> readAll() ;
        
        return View::make("transactions/index" , $transaction)  ;
    }

}