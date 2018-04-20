<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 19:51
 */

namespace Application\Order;


class Order
{
    use HasTotalTrait;

    private $id;
    private $customerId;
    private $items;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Order
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     * @return Order
     */
    public function setCustomerId(int $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Order
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }
}