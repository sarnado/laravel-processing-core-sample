<?php


namespace App\Core\TransactionProcessorPipes;


use App\Core\Statuses\TransactionStatuses;
use App\Core\TransactionProcessors\EmitDestinationBank;
use App\Core\TransactionProcessors\EmitUserBank;
use App\Models\Transaction;
use Closure;


class EmitDestinationBankPipe implements ITransactionProcessorPipe
{
    public function handle(Transaction $transaction, Closure $next)
    {
        if ($transaction->status === TransactionStatuses::CAPTURED) {
            return new EmitDestinationBank();
        }
        return $next($transaction);
    }
}
