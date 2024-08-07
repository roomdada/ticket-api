<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\ValidateOrderItentRequest;
use App\Service\CreateOrderService;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * @group Order Itents
 */
class OrderIntentController extends Controller
{
    /**
     * Création d'une intention de commande
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_intent_price' => 'required|numeric',
            'order_intent_type' => 'required|string',
            'user_email' => 'required|email',
            'user_phone' => 'required|string',
        ]);

        $orderIntent = OrderIntent::create($request->all());
        return response()->json($orderIntent, 201);
    }

    /**
     * Validate an order intent
     * @param mixed $id
     * @return mixed
     * @throws BindingResolutionException
     */
    public function confirm(ValidateOrderItentRequest $request, CreateOrderService  $createOrderService)
    {
        $orderIntent = OrderIntent::findOrFail($request->id);
        $order = $createOrderService->execute($request->except('order_intent_id', '__token'), $orderIntent);
        return response()->json(['message' => 'Order confirmed', 'download_url' => '...']);
    }
}