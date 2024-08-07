<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\myPDF;

class OrderController extends Controller
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
        return response()->json(['message' => 'Order confirmed', 'download_url' => '...']);
    }
    public function createOrder($orderIntentId)
    {
        // Récupérer l'intention de commande
        $orderIntent = OrderIntent::findOrFail($orderIntentId);

        // Créer une commande en associant l'intention de commande
        $order = Order::create([
            'order_intent_id' => $orderIntent->id,
            // autres champs nécessaires pour la commande
        ]);

        return response()->json($order, 201);
    }
    public function confirmOrder(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'order_intent_id' => 'required|exists:order_intents,order_intent_id',
            // autres validations si nécessaire
        ]);

        // Créer la commande
        $order = Order::create([
            'order_number' => 'ORD12345',
            'order_event_id' => 10,
            'order_price' => 1500,
            'order_type' => 'Online',
            'order_payment' => 'Credit Card',
            'order_info' => 'Livraison prévue sous 3 jours.',
            'order_created_on' => now(),
            'order_intent_id' => 1, // Si applicable
        ]);
        $pdf = new myPDF('order_number');

        // Define an alias for number of pages
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->headerAttributes();
        $pdf->SetFont('Times', '', 14);

        $directory = 'path/to/directory';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $outputPath = $directory . '/filename.pdf';

        $pdf->Output('F', $outputPath);
        return response()->json(['message' => 'Order confirmed', 'url_ticket' => "C:/wamp64/www/tikerama/storage/app/public/newfile.pdf"], 201);
    }
}