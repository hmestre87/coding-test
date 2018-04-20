<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 20:19
 */

namespace Application\Order\Exception;

class FailedItemTransformationException extends \Exception
{
    public function __construct(string $message = "Malformed items in the order", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}