@extends ('layouts.manage')

@section ('content')

<div class="flex-container">
  <div class="columns m-t-15">
    <div class="column">
        <h1 class="title">Manage Roles</h1>
    </div>
    <div class="column">
        <a href="{{route('roles.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i>Create New Role</a>
    </div>
  </div>
  <hr>
  <div class="card">
    <div class="card-content">
      <table class="table is-narrow">
        <thead>
          <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
              <tr>
                <th>{{$role->display_name}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td class="has-text-right"><a class="button is-outlined is-small m-r-5" href="{{route('roles.show', $role->id)}}">View</a><a class="button is-outlined is-small" href="{{route('roles.edit', $role->id)}}">Edit</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>


@endsection
