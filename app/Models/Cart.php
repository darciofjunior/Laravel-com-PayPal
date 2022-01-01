<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    protected $items = [];

    public function __construct()
    {
        if(Session::has('cart')) {
            $cart = Session::get('cart');
            $this->items = $cart->items;
        }
    }

    public function add(Product $product)
    {
        if(isset($this->items[$product->id])) {
            $this->items[$product->id] = [
                'item' => $product,
                'qtd' => $this->items[$product->id]['qtd'] + 1
            ];
        }else {
            $this->items[$product->id] = [
                'item' => $product,
                'qtd' => 1
            ];
        }
    }

    public function removeItem(Product $product)
    {
        if(isset($this->items[$product->id])) {
            if($this->items[$product->id]['qtd'] == 1) {
                unset($this->items[$product->id]);
            }else {
                $this->items[$product->id] = [
                    'item' => $product,
                    'qtd' => $this->items[$product->id]['qtd'] - 1
                ];
            }
        }else {
            $this->items[$product->id] = [
                'item' => $product,
                'qtd' => 1
            ];
        }
    }

    public function getItems()
    {
       return $this->items;
    }

    public function total()
    {
        $total = 0;

        if(count($this->items) == 0)
            return 0;

        foreach($this->items as $item) {
            $subTotal = $item['item']->price * $item['qtd'];

            $total += $subTotal;
        }

        return $total;
    }

    public function totalItems()
    {
        return count($this->items);
    }

    public function emptyItems()
    {
        if( Session::has('cart') )
            Session::forget('cart');
    }
}
