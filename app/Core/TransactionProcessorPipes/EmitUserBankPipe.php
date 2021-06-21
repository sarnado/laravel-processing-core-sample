<?php


namespace App\Core\TransactionProcessorPipes;


use App\Core\Statuses\TransactionStatuses;
use App\Core\TransactionProcessors\EmitUserBank;
use App\Models\Transaction;
use Closure;


class EmitUserBankPipe implements ITransactionProcessorPipe
{
    public function handle(Transaction $transaction, Closure $next)
    {
        if ($transaction->status === TransactionStatuses::CREATED) {
            return new EmitUserBank();
        }
        return $next($transaction);
    }
}
