@extends ('layouts.manage')

@section ('content')

  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Users</h1>
      </div>
      <div class="column">
        <a href="{{route('users.create')}}" class="button is-primary"><i class="fa fa-user-add m-r-10"></i>Create New User</a>
      </div>
    </div>
    <hr>

    <div class="card">
      <div class="card-content">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
                <tr>
                      <th>{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at->toFormattedDateString()}}</td>
                      <td><a href="{{route('users.edit', $user->id)}}" class="button is-warning is-small">Edit</a></td>
                      <td><a href="{{route('users.show', $user->id)}}" class="button is-info is-small">View</a></td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> <!-- end of .card -->

    {{$users->links()}}

  </div>

@endsection
