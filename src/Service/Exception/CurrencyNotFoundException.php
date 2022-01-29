<?php
namespace App\Service\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;
use Throwable;

class CurrencyNotFoundException extends Exception
{
    #[Pure]
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}