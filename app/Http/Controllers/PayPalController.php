<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\PayPal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    public function __construct()
    {
        $this->middleware('cart-items');
    }

    public function paypal(Order $order)
    {
        $cart = new Cart;
        $paypal = new PayPal($cart);

        $result = $paypal->generate();

        if( $result['status'] ) {
            $paymentId = $result['payment_id'];

            $order->newOrderProducts($cart->total(), $paymentId, $result['identify'], $cart->getItems());

            Session::put('payment_id', $paymentId);

            return redirect()->away($result['url_paypal']);
        }else {
            return redirect()->route('cart')->with('message', 'Erro inesperado !!!');
        }
    }

    public function returnPayPal(Request $request, Order $order)
    {
        $success = ($request->success == 'true') ? true : false;
        $paymentId = $request->paymentId;
        $token = $request->token;
        $payerID = $request->PayerID;

        if( !$success )
            return redirect()->route('cart')->with('message', 'Pedido Cancelado !!!');
        
        if( empty($paymentId)  || empty($token) || empty($payerID) )
            return redirect()->route('cart')->with('message', 'Não Autorizado !!!');

        if( !Session::has('payment_id') || Session::get('payment_id') != $paymentId ) 
            return redirect()->route('cart')->with('message', 'Não Autorizado !!!');

        $cart = new Cart;
        $paypal = new PayPal($cart);
        $response = $paypal->execute($paymentId, $token, $payerID);

        if( $response == 'approved' ) {
            $order->changeStatus($paymentId, 'approved');

            $cart->emptyItems();
            Session::forget('payment_id');

            return redirect()->route('home');
        }else {
            return redirect()->route('cart')->with('message', 'Pedido não foi Aprovado !!!');
        }
    }
}
