<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:11
 */

namespace Application\Discount\Type;


interface DiscountAmountInterface
{
    public function getDiscountAmount();

    public function hasDiscount();
}