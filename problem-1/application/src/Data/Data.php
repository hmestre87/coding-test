<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 19-04-2018
 * Time: 22:45
 */

namespace Application\Data;

use Application\Data\Exception\CustomerNotFoundException;
use Application\Data\Exception\ProductNotFoundException;

class Data
{
    private $products;
    private $customers;

    public function __construct()
    {
        $this->products = json_decode(file_get_contents(__DIR__ . '/data/products.json'), true);
        $this->customers = json_decode(file_get_contents(__DIR__ . '/data/customers.json'), true);
    }

    private function getCustomer(int $id)
    {
        return $this->binarySearch($id, $this->customers, 0, count($this->customers));
    }

    private function getProduct(int $id)
    {
        return $this->binarySearch($id, $this->products, 0, count($this->products));
    }

    private function binarySearch(int $value, array $array, int $start, int $end)
    {
        if ($end < $start) return false;

        $middle = floor(($end + $start) / 2);
        if ((int)$array[$middle]['id'] == $value) return $array[$middle];
        elseif ((int)$array[$middle]['id'] > $value) return $this->binarySearch($value, $array, $start, $middle - 1);
        else $this->binarySearch($value, $array, $middle + 1, $end);
    }

    public function getCustomerRevenue(int $id): float
    {
        $customer = $this->getCustomer($id);
        if (false === $customer) {
            throw new CustomerNotFoundException();
        }
        return (float)$customer['revenue'];
    }

    public function getProductCategory(int $id): int
    {
        $product = $this->getProduct($id);
        if (false === $product) {
            throw new ProductNotFoundException();
        }
        return (int)$product['category'];
    }
}