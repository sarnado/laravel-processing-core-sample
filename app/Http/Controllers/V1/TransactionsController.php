<?php


namespace App\Http\Controllers\V1;


use App\Core\CreateTransaction;
use App\DTO\CreateTransactionDTO;
use App\Http\Controllers\ApiController;
use App\Http\Requests\V1\CreateTransactionRequest;
use App\Http\Responses\ApiBaseResponse;
use App\Http\Responses\ApiErrorResponse;

class TransactionsController extends ApiController
{
    /**
     * Create new transaction on processing
     * @param CreateTransactionRequest $request
     * @return ApiBaseResponse
     */
    public function create(CreateTransactionRequest $request): ApiBaseResponse
    {
        try
        {
            // Create data transfer object
            $dto = new CreateTransactionDTO($request->all());
            // Generate transaction creator
            $core = new CreateTransaction($this->user, $dto);
            // Create transaction event on processing
            $result = $core->execute();
            return new ApiBaseResponse(true, $result);
        }
        catch (\Throwable $e)
        {
            return new ApiErrorResponse($e->getMessage());
        }
    }
}
