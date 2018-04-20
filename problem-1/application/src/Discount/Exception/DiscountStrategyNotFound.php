<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:19
 */

namespace Application\Discount\Exception;

class DiscountStrategyNotFound extends \Exception
{
    public function __construct(string $message = "The desired discount strategy was not found", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}