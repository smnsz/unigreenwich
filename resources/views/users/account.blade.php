@extends('layouts.app', ['title' => $user->first_name])

@section('content')
	<div class="container">
<div class="row">
	<div class="col-md-6">
		<h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
		<h4><i class="fa fa-clock-o"></i> Member since {{ $user->created_at->format('l jS \\of F Y') }}</h4>
	</div>

	<div class="col-md-6 text-right">
        @if($user->available_for_help)
          <ul class="list-inline">
              <li><i class="fa fa-star-o"></i> I'm available to help.</li>
          </ul>
        @endif
   </div>
</div>

<hr>

<div class="row">
  <div class="col-sm-3">
    <img src="{{ $user->present()->profileImage(200) }}" alt="{{ $user->username }}" class="img-rounded" width="100%" />
  </div>
  <div class="col-sm-4">
    <h3>Skills</h3>
    <br>
    <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $user->programming }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->programming }}%;">
        Programming
      </div>
    </div>
    <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $user->database }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->database }}%;">
        Database
      </div>
    </div>
    <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $user->frontend }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->frontend }}%;">
        Frontend
      </div>
    </div>
    <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $user->something }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->something }}%;">
        Something
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <h3>Information</h3>
    <br>
    <div>
		<p><i class="fa fa-user"></i> Student</p>
		<p><i class="fa fa-question"></i> 3rd year of study</p>
		<p><i class="fa fa-tag"></i> BSc Compunting</p>
		<p><i class="fa fa-comment-o"></i> Get in touch with person</p>
    </div>
  </div>
</div>

<br>

@stop