<div class="side-menu">
  <aside class="menu  m-t-10 m-l-10">

    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{route('users.index')}}">Manage Users</a></li>
      <li><a href="#">Roles &amp; Permissions</a>
        <ul>
          <li><a href="{{route('roles.index')}}" class="menu-list">Roles</a></li>
          <li><a href="{{route('permissions.index')}}" class="menu-list">Permissions</a></li>
        </ul>
      </li>


    </ul>
  </aside>
</div>
