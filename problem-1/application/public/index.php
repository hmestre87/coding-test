<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Application\Http\Controllers\DiscountController;
use Application\Discount\DiscountStrategyContext;
use Application\Order\OrderTransformer;
use Symfony\Component\HttpFoundation\JsonResponse;

try {

    $request = Request::createFromGlobals();

//if (0 !== strpos($request->headers->get('Content-Type'), 'application/json')) {
//    $response = new JsonResponse(['error' => 'Invalid Content-Type'], 406);
//}

    if ('/' !== $request->getPathInfo() && '/2' !== $request->getPathInfo() && '/3' !== $request->getPathInfo()) {
        $response = new JsonResponse(['error' => 'Invalid Route'], 400);
    }

    if (isset($response)) {
        $response->send();
    }

    switch ($request->getPathInfo()) {
        case '/':
            $data = json_decode(file_get_contents(__DIR__ . '/../orders/order1.json'), true);
            break;
        case '/2':
            $data = json_decode(file_get_contents(__DIR__ . '/../orders/order2.json'), true);
            break;
        case '/3':
            $data = json_decode(file_get_contents(__DIR__ . '/../orders/order3.json'), true);
    }

    $request->request->replace(is_array($data) ? $data : array());

    $controller = new DiscountController(new DiscountStrategyContext(), new OrderTransformer());
    $response = $controller->getDiscounts($request);


} catch (\Throwable $exception) {
    dump($exception);
    die;
}

$response->send();