@extends('store.template.master')

@section('content')

<h1 class="title">Lançamentos mais recentes:</h1>

@foreach ($products as $product)
<article class="col-md-3 col-sm-6 col-xm-12">
    <div class="product-item">
        <img src="{{url("assets/imgs/temp/{$product->image}")}}" alt="" class="product-item-img">

        <h1>{{$product->name}}</h1>

        <a href="{{route('add.cart', $product->id)}}" class="btn btn-buy">
            Adicionar no Carrinho
            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
        </a>
    </div>
</article>
@endforeach

@push('scripts')
<script>//alert('Teste !')</script>
@endpush

@endsection