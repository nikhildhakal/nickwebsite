@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title"><strong>{{$role->display_name}}</strong><small class="m-l-20"><em>({{$role->name}})</em></small></h1>
        <h5>{{$role->description}}</h{{$role->display_name}}5>
      </div> <!-- end of column -->

        <div class="column">
          <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-edit m-r-10"></i> Edit Role</a>
        </div>
    </div>
    <hr class="m-t-0">

    <div class="columns">
      <div class="column">
        @include('_includes.errors')
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <h2>Permissions:</h2>

                    <ul>
                      @foreach ($role->permissions as $permission)
                      <li>{{$permission->display_name}} - <em class="m-l-15">{{$permission->name}}</em></li>
                      @endforeach
                    </ul>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
@endsection
