<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu dropdown</title>
    <link rel="stylesheet" href="{{url('assets/css/menu.css')}}">
</head>

<body>
    <nav class="dp-menu">
        <ul>
            <li>
              <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{url('assets/imgs/novo_fotos_hd.png')}}" alt="Recupera Dados DJR" class="logo">
              </a>
            </li>
            <li>
              <a href="{{route('cart')}}">
                Meu Carrinho
                <button type="button" class="btn btn-primary">
                  <span class="badge badge-light">
                    @if(Session::has('cart'))
                      {{Session::get('cart')->totalItems()}}
                    @else
                      0
                    @endif
                  </span>
                </button>
              </a>
            </li>
            @if( auth()->check())
            <li>
                <a href="#">
                  {{ auth()->user()->name }}
                </a>
                <ul>
                    <li><a href="{{route('user.profile')}}">Perfil</a></li>
                    <li><a href="{{route('user.password')}}">Alterar Senha</a></li>
                    <li><a href="{{route('orders')}}">Meus Pedidos</a></li>
                    <li><a href="{{route('user.logout')}}">Sair</a></li>
                </ul>
            </li>
            @else
            <li>
              <a href="{{route('login')}}">Entrar</a>
            </li>
            @endif
        </ul>
    </nav>
</body>

</html>