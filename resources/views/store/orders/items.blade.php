@extends('store.template.master')

@section('content')

<h1 class="title">Detalhes do Pedido: {{$order->id}}</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>
                <img src="{{url("assets/imgs/temp/{$product->image}")}}" alt="" class="product-item-img-cart">
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->pivot->quantity}}</td>
            <td>{{$product->pivot->price}}</td>
        </tr>            
        @empty
        <tr>
            <td colspan="20">Nenhum Produto !!!</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection