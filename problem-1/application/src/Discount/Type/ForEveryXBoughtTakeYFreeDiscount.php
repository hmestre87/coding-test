<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:15
 */

namespace Application\Discount\Type;


use Application\Discount\Exception\TooMuchDiscount;

abstract class ForEveryXBoughtTakeYFreeDiscount implements DiscountAmountInterface, \JsonSerializable
{
    use DiscountTrait;

    protected $discountName = 'Abstract For Every X Bought Take Y Free Discount';

    public function __construct(int $itemQuantity, float $total, int $xAmount, int $yAmount)
    {
        if ($yAmount >= $xAmount) {
            throw new TooMuchDiscount();
        }
        if ($itemQuantity >= $xAmount) {
            $discountPercentage = (floor($itemQuantity / $xAmount) * $yAmount) / $itemQuantity * 100;
        }
        $this->discountAmount = $discountPercentage / 100 * $total;
        if ($this->discountAmount > 0) {
            $this->hasDiscount = true;
        }
    }
}