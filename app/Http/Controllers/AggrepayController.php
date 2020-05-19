<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AggrepayController extends Controller
{
    //
    public function payNow(Request $request) {
        // echo 'pay now';

        \Aggrepay::startPayment([
            'order_id' => 'test0015', 
            'amount' => '20.00', 
            'currency' => 'INR', 
            'description' => 'test', 
            'name' => 'akii', 
            'email' => 'bhendarkar.sandy@gmail.com', 
            'phone' => '9766952069', 
            'city' => 'Ngp', 
            'country' => 'IND', 
            'zip_code' => '440015', 
            'return_url' => url('/payStatus')
        ])->send();
    }

    public function paymentStatus(Request $request) {
        // echo 'pay now';

        \Aggrepay::paymentStatus([
            'order_id' => 'test0015',
            'return_url' => url('/payStatus')
        ])->send();
    }

    public function payStatus(Request $request) {
        
        $result = \Aggrepay::aggrepayData($_POST);

        echo json_encode($result->getParams());
    }
}
