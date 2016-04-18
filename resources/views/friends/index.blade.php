@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h4>Your friends</h4>

            @if ( !$friends->count() )
                <p>You have no friends.</p>
            @else
                @foreach ( $friends as $user )
                    @include('form.friend')
                @endforeach
            @endif

        </div>
        <div class="col-lg-6">
            <h4>Friend requests</h4>

            @if ( !$requests->count() )
            	<p>You have no requests.</p>
            @else
            	@foreach ( $requests as $user )
            		@include('form.friend')
            	@endforeach
            @endif
        </div>
    </div>
</div>

<br>
@stop