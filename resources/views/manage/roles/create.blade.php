@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title"><strong>Create New Role</strong></h1>
      </div> <!-- end of column -->

    </div>
    <hr class="m-t-0">
    <form class="form" action="{{route('roles.store')}}" method="post">
      {{csrf_field()}}


      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2>Role Details:</h2>
                  <div class="field">
                    <div class="control">
                      <label for="display_name" class="label">Name (Human Readable)</label>
                      <input type="text" name="display_name" class="input" id="display_name">
                    </div>
                  </div>

                  <div class="field">
                    <label for="name" class="label">Slug</label>
                    <input type="text" name="name" class="input" id="name">
                  </div>

                  <div class="field">
                    <label for="description" class="label">Description</label>
                    <input type="text" name="description" id="description" class="input">
                  </div>

                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
      <input type="hidden" name="permissions" :value="permissionsSelected"> <!--To send the value of vue data-->
      <div class="columns">
       <div class="column">
         <div class="box">
           <article class="media">
             <div class="media-content">
               <div class="content">
                 <h2 class="title">Permissions:</h1>
                 <b-checkbox-group v-model="permissionsSelected">
                   @foreach ($permissions as $permission)
                     <div class="field">
                       <b-checkbox :custom-value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                     </div>
                   @endforeach
                 </ul>
               </div>
             </div>
           </article>
         </div> <!-- end of .box -->

         <button class="button is-primary">Create new  Role</button>
       </div>
     </div>

    </form>



  </div>
@endsection

@section ('scripts')

<script>
    var app = new Vue({
      el: '#app',
      data: {
        permissionsSelected: ' '
      }
    });
</script>
@endsection
