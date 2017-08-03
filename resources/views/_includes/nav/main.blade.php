<nav class="nav has-shadow" >
  <div class="container">
    <div class="nav-left">
      <a class="nav-item is-paddingless" href="{{route('home')}}">
        <img src="{{asset('images/logo.png')}}" alt="DevMarketer logo">
      </a>
      <a class="nav-item is-tab is-hidden-mobile m-l-10">Home</a>
      <a class="nav-item is-tab is-hidden-mobile">About Us</a>
      <a class="nav-item is-tab is-hidden-mobile">Contact</a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu" style="overflow: visible">
      <a href="{{route('home')}}" class="navbar-item is-tab is-hidden-tablet is-active">Home</a>
      <a href="#" class="navbar-item is-tab is-hidden-tablet">About Us</a>
      <a href="#" class="navbar-item is-tab is-hidden-tablet">Contact</a>
      @if (Auth::guest())
        <a href="{{route('login')}}" class="nav-item is-tab">Login</a>
        <a href="{{route('register')}}" class="nav-item is-tab">Sign Up</a>
      @else
        <button class="dropdown is-aligned-right nav-item is-tab is-hoverable" >
          Hey {{ Auth::user()->name }}  <span><i class="fa fa-caret-down m-l-5"></i></span>
          <ul class="dropdown-menu" style="overflow: visible;">
            <li><a href="#">
                  <span class="icon">
                    <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                  </span>Profile
                </a>
            </li>
            <li><a href="#">
                  <span class="icon">
                    <i class="fa fa-fw fa-bell m-r-5"></i>
                  </span>Notifications
                </a>
            </li>
            <li><a href="{{route('manage.dashboard')}}">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Manage
                </a>
            </li>
            <li class="seperator"></li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                  <span class="icon">
                    <i class="fa fa-fw fa-sign-out m-r-5"></i>
                  </span>
                  Logout
                </a>
                @include('_includes.forms.logout')
            </li>
          </ul>
        </button>
      @endif
    </div>
  </div>
</nav>
