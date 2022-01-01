@extends('store.template.master')

@section('content')

<h1 class="title">Meu Perfil:</h1>

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if(isset($errors) && count($errors) > 0)
<div class="alert alert-warning">
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif

<form class="form" action="{{route('update.profile')}}" method="post">
    {!! csrf_field() !!}
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="Nome" class="form-control">
    </div>

    <div class="form-group">
        <label>E-mail:</label>
        <input type="text" name="email" value="{{auth()->user()->email}}" placeholder="E-mail" disabled class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-default">
    </div>
</form>

@endsection