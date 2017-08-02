@extends ('layouts.manage')

@section ('content')

<div class="flex-container">
  <div class="columns m-t-10">
    <div class="column">
      <h1 class="title">View User Details</h1>
    </div>
    <div class="column">
      <a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-r-10"></i>Edit User</a>
    </div>
  </div>
  <hr>

  <div class="columns">
    <div class="column">
      <div class="field">
        <label for="name" class="label">Name:</label>
        <pre>{{$user->name}}</pre>
      </div>
      <div class="field">
        <label for="email" class="label">Email</label>
        <pre>{{$user->email}}</pre>
      </div>
      <div class="field">
        <label for="roles" class="label">Roles</label>
        <pre>This user has not been assigned role yet.</pre>
      </div>
    </div>

  </div>
</div>

@endsection
