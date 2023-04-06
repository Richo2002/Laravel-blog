<header>
    <img src="/storage/logo_blog.png" alt="Richo Blog" id="logo"> 
    <form action="" method="post">
        <input type="text" name="" id="" placeholder="search">
         {{-- font awesome icon --}}
        {{-- <i class="fas fa-serach" class="searchIcon"></i> --}}
        <a href=""><img src="/storage/search.png" alt="Rechercher" id="search"></a>
    </form>
    @if (Auth::check())
    <a href="{{ route('logout') }}">Deconnexion</a>
    @endif
</header>