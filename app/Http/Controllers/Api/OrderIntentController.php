<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\OrderIntentController;

class OrderIntentController extends Controller
{
    public function store(Request $request)
    {
        $orderIntent = OrderIntent::create($request->all());
        return response()->json($orderIntent, 201);
    }

    public function confirm($id)
    {
        $orderIntent = OrderIntent::findOrFail($id);
        // Logique pour valider l’intention de commande et générer les tickets
        // ...
        return response()->json(['message' => 'Order confirmed', 'download_url' => '...']);
    }
}