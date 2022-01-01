<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $title = 'Meu carrinho de Compras';

        $cart = Session::has('cart') ? Session::get('cart') : new Cart;
        $total = $cart->total();
        $products = $cart->getItems();

        return view('store.cart.index', compact('title', 'total', 'products'));
    }

    public function add($id)
    {
        $product = Product::find($id);

        if(!$product)
            return redirect()->route('home');

        $cart = new Cart();
        $cart->add($product);
        Session::put('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove($id)
    {
        $product = Product::find($id);

        if(!$product)
            return redirect()->route('home');

        $cart = new Cart();
        $cart->removeItem($product);
        Session::put('cart', $cart);

        return redirect()->route('cart');
    }
}
