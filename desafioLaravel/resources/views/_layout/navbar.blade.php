<div class="container-fluid bg-dark navbar-dark  bg-dark text-center">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    
      <a href="/" class="navbar-brand">
        <a class="nav-link active" aria-current="page" href="/">AUTO Veículos</a>
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/veiculos">VEÍCULOS</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link active" aria-current="page" href="/manutencao"> MANUTENÇÕES</a>
        </li>

        @auth

        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <a href="/logout" class="nav-link" onclick="event.preventDefault();
                    this.closest('form').submit();">
              Sair
            </a>
          </form>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a href="/login" class="nav-link">Entrar</a>
        </li>
        <li class="nav-item">
          <a href="/register" class="nav-link">Cadastrar</a>
        </li>
        @endguest
      </ul>
    
  </nav>
  <main>
    <div class="container-fluid">
      <div class="row">
        @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
        @endif
        @yield('content')
      </div>
    </div>
  </main>

</div>