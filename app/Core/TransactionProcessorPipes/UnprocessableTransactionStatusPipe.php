<?php


namespace App\Core\TransactionProcessorPipes;


use App\Core\Statuses\TransactionStatuses;
use App\Core\TransactionProcessors\CheckTransactionStatus;
use App\Core\TransactionProcessors\EmitDestinationBank;
use App\Core\TransactionProcessors\EmitUserBank;
use App\Models\Transaction;
use Closure;


class UnprocessableTransactionStatusPipe implements ITransactionProcessorPipe
{

    public function handle(Transaction $transaction, Closure $next): void
    {
        throw new \RuntimeException('Undefined transaction status');
    }
}
