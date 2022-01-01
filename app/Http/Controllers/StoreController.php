<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    public function index()
    {
        $title = 'Home Page Laravel PayPal';

        $products = Product::orderBy('id', 'DESC')->get();

        return view('store.home.index', compact('title', 'products'));
    }

    public function orders()
    {
        $title = 'Meus Pedidos';

        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('store.orders.orders', compact('title', 'orders'));
    }

    public function orderDetail($id)
    {
        $order = Order::find($id);
        if( !$order )
            return redirect()->route('orders');

        //$this->authorize('owner-order', $order);
        //Gate::allows('owner-order', $order)

        if( Gate::denies('owner-order', $order) )
            return redirect()->back();

        $products = $order->products()->get();

        $title = "Produtos do Pedido: {$order->id} ";

        return view('store.orders.items', compact('order', 'products', 'title'));
    }
}
