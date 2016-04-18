@extends('layouts.app', ['title' => 'Users'])

@section('content')
	<div class="container">
		<h1 class="text-center">List of {{ $usersCount }} student in the community</h1>

		<br>

		@foreach ($users->chunk(12) as $group)
			<div class="row">
				@foreach ($group as $user)
					<div class="col-md-1 col-sm-3 col-xs-4 text-center spaced">
						<a href="{{ route('profile_path', $user->username) }}"><img src="{{ $user->present()->profileImage(70) }}" width="70" alt="{{ $user->username }}" class="img-rounded" /></a>
					</div>
				@endforeach
			</div>
		@endforeach

		{!! $users->render() !!}
	</div>
@stop