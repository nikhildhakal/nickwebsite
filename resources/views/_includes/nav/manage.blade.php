<div class="side-menu">
  <aside class="menu  m-t-10 m-l-10">

    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{ route('home') }}" class="{{Request::is('manage/dashboard') ? 'is-active' : ''}}">Dashboard</a></li>
    </ul>

    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list">
      <li><a href="{{route('users.index')}}" class="{{Request::is('manage/users') ? 'is-active' : ''}}">Manage Users</a></li>
      <li><a href="#">Roles &amp; Permissions</a>
        <ul>
          <li><a href="{{route('roles.index')}}" class="{{Request::is('manage/roles') ? 'is-active' : ''}} menu-list">Roles</a></li>
          <li><a href="{{route('permissions.index')}}" class="{{Request::is('manage/permissions') ? 'is-active' : ''}} menu-list">Permissions</a></li>
        </ul>
      </li>


    </ul>
  </aside>
</div>
