<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 20:44
 */

namespace Application\Order;


trait HasTotalTrait
{

    private $total;

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return Order
     */
    public function setTotal(float $total): self
    {
        $this->total = $total;
        return $this;
    }
}