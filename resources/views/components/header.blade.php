  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{asset('storage/avatars/logo.png')}}" alt="Blog Logo" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="{{route('home')}}" wire:navigate>CesarBlog</a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="{{route('home')}}" class="nav-link scrollto {{Route::is('home') ? 'active': '' }}" wire:navigate><i class="bx bx-home"></i> <span>Accueil</span></a></li>
          <hr class="bg-danger">
          <li>
            <a href="{{route('post.all')}}" class="nav-link scrollto {{Route::is('post.all') ? 'active' : ''}} " wire:navigate><i class="bx bx-receipt"></i> <span>Blog</span></a>
          </li>
          <hr>
          @if(Auth::id() == 1)
          <li>
            <a href="{{route('post.create')}}" class="nav-link scrollto {{Route::is('post.create') ? 'active' : ''}}" wire:navigate><i class="bx bx-add-to-queue"></i> <span>Créer un article</span></a>
          </li>
          <hr>
          <li>
            <a href="{{route('category.index')}}" class="nav-link scrollto {{Route::is('category.index') ? 'active' : ''}}" wire:navigate><i class="bx bx-list-ol"></i> <span>Catégories</span></a>
          </li>
          <hr>
          <li>
            <a href="{{route('messages')}}" class="nav-link scrollto {{Route::is('messages') ? 'active' : ''}}" wire:navigate><i class="bx bxl-messenger"></i> <span>Messages</span></a>
          </li>
          <hr>
          @endif


          <li><a href="{{route('about')}}" class="nav-link scrollto {{Route::is('about') ? 'active' : ''}}" wire:navigate><i class="bx bx-info-circle"></i> <span>A propos</span></a></li>
        
          @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link scrollto {{Route::is('login') ? 'active' : ''}}" href="{{ route('login') }}" wire:navigate>
                        <i class="bx bxs-log-in-circle"></i> 
                        <span>{{ __('Se connecter') }}</span>
                    </a>
                </li>
            @endif

          @else
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" wire:navigate>
                        <i class="bx bx-log-out-circle"></i> 
                        <span>{{ __('Se deconnecter') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </li>
          @endguest
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->