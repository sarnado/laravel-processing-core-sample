<?php


namespace App\Core\TransactionProcessorPipes;


use App\Models\Transaction;
use Closure;

interface ITransactionProcessorPipe
{
    public function handle(Transaction $transaction, Closure $next);
}
