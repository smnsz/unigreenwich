@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6">

        
        <h1>Message</h1>
        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
                    <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->first_name !!}" class="img-circle">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">{!! $message->user->first_name !!}</h5>
                    <p>{!! $message->body !!}</p>
                    <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                </div>
            </div>
        @endforeach
        
        
        <h2>Add a new message</h2>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
        <!-- Message Form Input -->
         {!! Form::hidden('sendmessageshow', '1') !!}
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>
        
        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Send', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop