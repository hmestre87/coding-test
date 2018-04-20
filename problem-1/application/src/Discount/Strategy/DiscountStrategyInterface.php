<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 19:36
 */

namespace Application\Discount\Strategy;


use Application\Order\Order;

interface DiscountStrategyInterface
{
    public function getDiscounts(Order $order);
}