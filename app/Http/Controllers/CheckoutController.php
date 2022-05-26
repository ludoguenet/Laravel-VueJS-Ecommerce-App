<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function create()
    {
        return view('checkout.create');
    }

    public function paymentIntent()
    {
        \Stripe\Stripe::setApiKey('sk_test_51L3kquLRVvzp6xt9rynkwX0ZIbanFU0yKsjnhWcoMmZCdNv7N69jf715LXwem3W4GO7Kvczk7VBvOkzheOBweNwb00o9Cwsvu5');

        header('Content-Type: application/json');

        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);
        
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => (new CartRepository())->total(),
                'currency' => 'eur',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
        
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
        
            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
