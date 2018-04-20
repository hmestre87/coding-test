<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 19:58
 */

namespace Application\Order;


use Application\Order\Exception\FailedItemTransformationException;
use Application\Order\Exception\FailedTransformationException;
use Application\Order\Exception\NoItemsException;

class OrderTransformer
{
    private $isItemsEmpty = true;
    private $itemTransformer;

    public function __construct()
    {
        $this->itemTransformer = new ItemTransformer();
    }

    public function transform(array $order): Order
    {
        $newOrder = new Order;
        try {
            $newOrder->setId((int)$order['id'])
                ->setCustomerId((int)$order['customer-id'])
                ->setTotal((float)$order['total']);
            $items = [];
            foreach ($order['items'] as $item) {
                $items[] = $this->itemTransformer->transform($item);
            }
            if (empty($items))
                throw new NoItemsException();
            $newOrder->setItems($items);
        } catch (FailedItemTransformationException $exception) {
            throw new FailedTransformationException($exception->getMessage());
        } catch (NoItemsException $exception) {
            throw new FailedTransformationException($exception->getMessage());
        } catch (\Exception $exception) {
            throw new FailedTransformationException('Malformed order');
        }
        return $newOrder;
    }


}