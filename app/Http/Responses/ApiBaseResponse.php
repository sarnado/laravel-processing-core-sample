<?php


namespace App\Http\Responses;


use Illuminate\Http\JsonResponse;

class ApiBaseResponse extends JsonResponse
{
    public function __construct(bool $success = true, $data = [], $status = JsonResponse::HTTP_OK, $error = null, array $headers = [], $options = 0)
    {
        if ($error !== null && !is_array($error)) {
            $error = ['error' => $error];
        }
        $result = [
            'success' => $success,
            'data' => $data,
            'errors' => $error,
        ];
        parent::__construct($result, $status, $headers, $options);
    }
}
