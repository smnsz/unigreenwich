<div class="media">

	<a class="pull-left" href="{{ route('profile_path', $user->username) }}">
		<img class="media-object" alt="{{ $user->first_name }}" src="{{ $user->present()->profileImage(70) }}">
	</a>

	<div class="media-body">
		<h4 class="media-heading"><a href="{{ route('profile_path', $user->username) }}">{{ $user->first_name }}</a></h4>
	</div>
	<p>{{ $user->location }}</p>

</div>