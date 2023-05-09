<?php

namespace App\Http\Controllers;

use App\Models\Poppings;
use App\Models\BubbleTeas;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $bubbleTea = BubbleTeas::where('id', $request->bubbleTeaId)->first();
        $total_price = floatval($bubbleTea->price);
        if (array_key_exists($request->bubbleTeaId, $cart)) {
            $cart[$request->bubbleTeaId]['quantity'] += $request->quantity;
            $bubbleTea = BubbleTeas::where('id', $request->bubbleTeaId)->first();
            $cart[$request->bubbleTeaId]['price'] += floatval($bubbleTea->price);
            $cart[$request->bubbleTeaId]['total_price'] += $total_price;
        } else {
            // first mean first row
            $popping = Poppings::where('id', $request->poppingId)->first();
            switch ($request->quantity_sugar) {
                case 1:
                    $quantity_sugar = '30%';
                    $total_price -= 0.25;
                    break;
                case 2:
                    $quantity_sugar = '50%';
                    $total_price -= 0.15;
                    break;
                case 3:
                    $quantity_sugar = '100%';
                    break;
                case 4:
                    $quantity_sugar = '120%';
                    $total_price += 0.5;
                    break;
                default:
                    $quantity_sugar = '0%';
                    $total_price -= 0.5;
                    break;
            };
            switch ($request->format) {
                case 2:
                    $format = "Medium";
                    break;
                case 3:
                    $format = "Large";
                    $total_price += 1;
                    break;
                default:
                    $format = "Small";
                    $total_price -= 1;
                    break;
            };
            $temperature = $request->temperature;
            switch ($temperature) {
                case 1:
                    $temperature = "cold";
                    break;
                case 2:
                    $temperature = "hot";
                    break;
            };
            $cart[$request->bubbleTeaId] = [
                'quantity' => $request->quantity,
                'popping' => $popping->flavor,
                'sugar_quantity' => $quantity_sugar,
                'price' => floatval($bubbleTea->price),
                'temperature' => $temperature,
                'format' => $format,
                'name' => $bubbleTea->name,
                'created_at' => $bubbleTea->created_at,
                'total_price' => $total_price,
            ];
        }
        session()->put('cart', $cart);
    }
}
