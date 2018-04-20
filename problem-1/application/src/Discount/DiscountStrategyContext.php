<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 19:43
 */

namespace Application\Discount;


use Application\Data\Data;
use Application\Discount\Exception\DiscountStrategyNotFound;
use Application\Discount\Strategy\DiscountStrategyInterface;
use Application\Discount\Strategy\NormalDiscountStrategy;

class DiscountStrategyContext
{
    private $strategy;

    public function __construct(string $discountStrategyClass = NormalDiscountStrategy::class)
    {
        switch ($discountStrategyClass) {
            case NormalDiscountStrategy::class:
                $this->strategy = new NormalDiscountStrategy(new Data());
                break;
            default:
                throw new DiscountStrategyNotFound();
        }
    }

    public function getStrategy(): DiscountStrategyInterface
    {
        return $this->strategy;
    }

}