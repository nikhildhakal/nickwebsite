@if (Session::has('success'))

<div class="notification is-success">
  <strong>Success:</strong> {{ Session::get('success') }}
</div>

@endif

@if (count($errors))


	<div class="notification is-danger">

			<ul>Uh oh!
				@foreach ($errors->all() as $error)

						<li>{{ $error }}</li>

				@endforeach
			</ul>

	</div>





@endif
