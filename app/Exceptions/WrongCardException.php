<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\Pure;

class WrongCardException extends Exception
{
    private string $field;

    #[Pure] public function __construct(string $error, string $field)
    {
        $this->field = $field;
        parent::__construct($error);
    }


    public function render(): ValidationException
    {
        return ValidationException::withMessages([
            $this->field => 'Wrong card number'
        ]);
    }
}
