<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 19:58
 */

namespace Application\Order;


use Application\Order\Exception\FailedItemTransformationException;

class ItemTransformer
{
    public function transform(array $item): Item
    {
        $newItem = new Item;
        try {
            $newItem->setProductId((int)$item['product-id'])
                ->setQuantity((int)$item['quantity'])
                ->setUnitPrice((float)$item['unit-price'])
                ->setTotal((float)$item['total']);
        } catch (\Exception $exception) {
            throw new FailedItemTransformationException();
        }
        return $newItem;
    }


}