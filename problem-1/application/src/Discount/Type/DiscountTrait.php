<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 20-04-2018
 * Time: 0:44
 */

namespace Application\Discount\Type;


trait DiscountTrait
{
    protected $hasDiscount = false;
    protected $discountAmount;

    public function jsonSerialize()
    {
        return ['discount' => ['name' => $this->discountName, 'total' => $this->discountAmount]];
    }

    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    public function hasDiscount()
    {
        return $this->hasDiscount;
    }
}