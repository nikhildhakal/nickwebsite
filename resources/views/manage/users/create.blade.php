@extends ('layouts.manage')

@section ('content')

  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New user</h1>
      </div>
    </div>

    <hr class="m-t-0">
    @include('_includes.errors')
  <form class="form" action="{{route('users.store')}}" method="post">
      {{csrf_field()}}
    <div class="columns">
      <div class="column">
        <div class="field">
            <label for="name" class="label">Name:</label>
            <p class="control">
              <input type="text" class="input" name="name" id="name" required>
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Email Address:</label>
            <p class="control">
              <input type="text" class="input" name="email" id="email" required>
            </p>
          </div>

          <div class="field">
           <label for="password" class="label">Password</label>
           <p class="control">
             <input type="text" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
             <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
           </p>
         </div>
      </div><!--end of .column-->

      <div class="column">
        <label for="roles" class="label">Roles:</label>
        <input type="hidden" name="roles_selected" :value="rolesSelected">

        <b-checkbox-group v-model="rolesSelected">
          @foreach ($roles as $role)
            <div class="field">
              <b-checkbox :custom-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
            </div>
          @endforeach
        </b-checkbox-group>
      </div>
    </div><!--end of .columns-->

    <div class="columns">
      <div class="column">
            <hr>
            <button class="button is-success" style="width:250px;">Create New User</button>
      </div>
    </div>

  </form>
  </div><!-- end of .flex-container-->


@endsection

@section ('scripts')

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true,
        rolesSelected: {!! old('roles') ? old('roles') : '[]' !!}    //Array
      }
    });
  </script>

@endsection
