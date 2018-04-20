<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 22:40
 */

namespace Application\Discount\Strategy;


use Application\Data\Data;
use Application\Discount\Type\DiscountAmountInterface;
use Application\Discount\Type\ForEverySixSwitchesBoughtTakeOneFreeDiscount;
use Application\Discount\Type\OneThousandRevenueGlobalDiscount;
use Application\Order\Item;
use Application\Order\Order;

class NormalDiscountStrategy implements DiscountStrategyInterface
{
    private $data;

    public function __construct(Data $data)
    {
        $this->data = $data;
    }

    public function getDiscounts(Order $order): array
    {
        $discounts = $this->calculateDiscounts($order);
        $total = 0;
        /** @var DiscountAmountInterface $discount */
        foreach ($discounts as $discount) {
            $total += $discount->getDiscountAmount();
        }
        return ['discounts' => $discounts, 'total' => $total];
    }

    public function calculateDiscounts(Order $order): array
    {
        return $this->getGlobalDiscounts($order) + $this->getItemDiscounts($order);
    }

    private function getGlobalDiscounts(Order $order): array
    {
        $discount = new OneThousandRevenueGlobalDiscount($this->data->getCustomerRevenue($order->getCustomerId()), $order->getTotal());
        if ($discount->hasDiscount()) {
            return [$discount];
        }
        return [];
    }

    private function getItemDiscounts(Order $order): array
    {
        $discounts = [];

        /** @var Item $item */
        foreach ($order->getItems() as $item) {
            $discount = null;
            switch ($this->data->getProductCategory($item->getProductId())) {
                case 2:
                    $discount = new ForEverySixSwitchesBoughtTakeOneFreeDiscount($item->getQuantity(), $item->getTotal());
                    break;
            }
            if (null !== $discount && $discount->hasDiscount()) {
                $discounts[] = $discount;
            }
        }
        return $discounts;
    }

}