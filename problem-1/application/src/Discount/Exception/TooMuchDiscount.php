<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:19
 */

namespace Application\Discount\Exception;

class TooMuchDiscount extends \Exception
{
    public function __construct(string $message = "Wow, keep the discount under 100%!", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}