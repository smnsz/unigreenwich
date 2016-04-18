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

            @if(Auth::user()->hasFriendRequestPending($user) )
            <strong>Waiting for {{ $user->first_name }} to accept your request.</strong>
            @elseif ( Auth::user()->hasFriendRequestReceived($user) )
            <a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept friend request</a>
            @elseif ( Auth::user()->isFriendWith($user) )
            <p>You and {{ $user->first_name }} are friends</p>
            @elseif ( Auth::user()->id !== $user->id )
            <a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">Add as friend</a>
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
                    Frontend
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
                <p><i class="fa fa-question"></i> {{ $user->year_of }} year of study</p>
                <p><i class="fa fa-tag"></i> BSc Compunting</p>
                <p><a href="{{ route('messages.create') }}"><i class="fa fa-comment-o"></i> Get in touch with person</a></p>

                @if ( Auth::user()->isFriendWith($user) )
                    <p><a href="javascript:void(0);"><i class="fa fa-envelope-o"></i></a>   {!! link_to('messages/sendmessage/' . $user->username, 'Send Message') !!}</p>
                @endif

            </div>
        </div>
    </div>
    <br>
    <div id="map-canvas" style="width:100%; height:200px;"></div>
</div>

<br>



@stop
@section('scripts.footer')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
function initialize() {
    var myLatlng = new google.maps.LatLng(Community.latitude, Community.longitude);

    var mapOptions = {
        zoom: 10,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        animation: google.maps.Animation.DROP
    });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop
