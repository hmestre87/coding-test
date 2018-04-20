<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 23:09
 */

namespace Application\Discount\Type;


final class OneThousandRevenueGlobalDiscount extends GlobalDiscount
{
    private $discountPercentage = 10;
    protected $discountName = 'For having spent more than 1000€ Discount';

    public function __construct(float $revenue, float $total)
    {
        if ($revenue > 1000) {
            parent::__construct($total, $this->discountPercentage);
        }
    }
}