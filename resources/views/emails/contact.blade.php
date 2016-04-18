<h1>Message</h1>

<h4>Sender: {{ $data['name'] }} - {{ $data['email'] }}</h4>

<div>
	{{ $data['message'] }}
</div>

<p><small>Send from <a href="{{ route('root_path', null, true) }}">Student Community</a></small></p>