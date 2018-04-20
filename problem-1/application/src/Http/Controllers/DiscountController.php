<?php

namespace Application\Http\Controllers;

use Application\Discount\DiscountStrategyContext;
use Application\Order\Exception\FailedTransformationException;
use Application\Order\OrderTransformer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiscountController
{
    private $discountStrategyContext;
    private $orderTransformer;

    public function __construct(DiscountStrategyContext $discountStrategyContext, OrderTransformer $orderTransformer)
    {
        $this->discountStrategyContext = $discountStrategyContext;
        $this->orderTransformer = $orderTransformer;
    }

    public function getDiscounts(Request $request): JsonResponse
    {
        $httpStatus = 200;
        try {
            $order = $this->orderTransformer->transform($request->request->all());
            $response = $this->discountStrategyContext->getStrategy()->getDiscounts($order);
        } catch (FailedTransformationException $exception) {
            $response = ['error' => $exception->getMessage()];
            $httpStatus = 400;
        } catch (\Exception $exception) {
            $response = ['error' => $exception->getMessage()];
            $httpStatus = 500;
        }

        return new JsonResponse($response);
    }
}