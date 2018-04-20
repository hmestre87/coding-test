<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:01
 */

namespace Application\Data\Exception;


class ProductNotFoundException extends RecordNotFoundException
{
    public function __construct(string $message = "Product Not Found", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}