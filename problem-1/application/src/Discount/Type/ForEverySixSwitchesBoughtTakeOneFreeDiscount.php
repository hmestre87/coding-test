<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:15
 */

namespace Application\Discount\Type;


class ForEverySixSwitchesBoughtTakeOneFreeDiscount extends ForEveryXBoughtTakeYFreeDiscount
{
    protected $discountName = 'For Every 6 Switches Bought Take 1 Free Discount';

    public function __construct(int $itemQuantity, float $total)
    {
        parent::__construct($itemQuantity, $total, 6, 1);
    }
}