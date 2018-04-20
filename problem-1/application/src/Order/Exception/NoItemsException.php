<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 20:19
 */

namespace Application\Order\Exception;


class NoItemsException extends \Exception
{
    public function __construct(string $message = "No items were found in the order", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}