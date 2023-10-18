<header id="header" class="fixed-top d-flex justify-content-center align-items-center header-scrolled">

  <nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto {{Route::is('home') ? 'active' : ''}}" href="{{route('home')}}" wire:navigate>Home</a></li>
      <li><a class="nav-link scrollto {{Route::is('post.all','post.show','post.update','post.create') ? 'active' : ''}}" href="{{route('post.all')}}" wire:navigate>Posts</a></li>

      @auth
          
      @endauth

      <li class="dropdown"><a href="#"><span>Posts</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="{{route('post.all')}}" wire:navigate>All</a></li>
          <li><a href="{{route('post.create')}}" wire:navigate>Create a new</a></li>
        </ul>
      </li>
      <li><a class="nav-link scrollto  {{Route::is('about') ? 'active' : ''}}" href="#about" wire:navigate>About</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->

</header>