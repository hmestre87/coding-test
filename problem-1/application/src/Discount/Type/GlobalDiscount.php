<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:15
 */

namespace Application\Discount\Type;


use Application\Discount\Exception\TooMuchDiscount;

abstract class GlobalDiscount implements DiscountAmountInterface, \JsonSerializable
{
    use DiscountTrait;

    protected $discountName = 'Abstract Global Discount';

    public function __construct(float $total, float $discountPercentage)
    {
        if ($discountPercentage >= 100) {
            throw new TooMuchDiscount();
        }
        $this->discountAmount = $discountPercentage / 100 * $total;
        $this->hasDiscount = true;
    }
}