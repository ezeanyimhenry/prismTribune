<?php
namespace App\Exceptions;

use Exception;

class ValidationResponseException extends Exception
{
    protected $responseData;

    public function __construct(array $responseData, $message = "Validation failed", $code = 422)
    {
        $this->responseData = $responseData;
        parent::__construct($message, $code);
    }

    public function getResponseData()
    {
        return $this->responseData;
    }
}