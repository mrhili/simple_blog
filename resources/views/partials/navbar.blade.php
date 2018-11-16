{{--L15:CHANGING THE id FROM navbar-static-top TO navbar-fixed-top --}}
<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
    </div>
    
    


    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        &nbsp;
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-left">
        
        @if (Auth::user())
          <li class=""><a href="{{ route('favorites', Auth::user()->id) }}">الأفضل</a></li>
        @endif
        
        <li class="{{ Request::is('tags')? 'active' : '' }}"><a href="{{ route('tags.index') }}">علامات</a></li>
        <li class="{{ Request::is('categories')? 'active' : '' }}"><a href="{{ route('categories.index') }}">أقسام</a></li>
        
        {{-- L98: ADDING THE SEARCH FORM --}}
        <li>
            <form methode="GET" action="">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="search" name="q" class="form-control" placeholder="بحت" id="q" />
                </div>
            </form>
        </li>
        {{-- 
          L97: IF ADMIN PASS TO THE NEXT REQUEST
            AND IF ITS AN ADMIN SHOW THE BUTTON CREATE THE POST BUTTON
         --}}
        @if (Auth::user())
          @if (Auth::user() || Auth::user()->isAdmin())
            <li><a href="{{ route('posts.create') }}">كتابة</a></li>
          @endif
        @endif
        
        
        
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><a href="{{ url('/login') }}">دخول</a></li>
        <li><a href="{{ url('/register') }}">تسجيل</a></li>
        @else
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خروج
                                        </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>