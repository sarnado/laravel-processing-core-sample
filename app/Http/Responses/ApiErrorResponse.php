<?php


namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;

class ApiErrorResponse extends ApiBaseResponse
{
    public function __construct($error = null, $status = JsonResponse::HTTP_UNPROCESSABLE_ENTITY , array $headers = [], $options = 0)
    {
        if ($error !== null && !is_array($error)) {
            $error = ['error' => $error];
        }
        parent::__construct(false, null, $status, $error, $headers, $options);
    }
}
