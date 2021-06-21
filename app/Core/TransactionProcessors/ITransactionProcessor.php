<?php


namespace App\Core\TransactionProcessors;


use App\Models\Transaction;

interface ITransactionProcessor
{
    public function process(Transaction $transaction): Transaction;
}
