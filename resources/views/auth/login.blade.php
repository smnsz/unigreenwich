@extends('layouts.app', ['title' => 'Login'])


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Welcome Back!</h3>
                        </div>
                    </div>
                    
                    <div class="panel-body">

                        @include('errors.list')

                        <form method="POST" action="/auth/login">
                            {!! csrf_field() !!}

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember"> Remember Me
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-default">Login</button>
                            </div>
                        </form>

                        <a href="{{ url('/password/email') }}">Forgot your password?</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">
							<h3>Sign up now for FREE</h3>
						</div>
					</div>
					
					<div class="panel-body">
						<ul>
							<li>Be a part of the community</li>
							<li>Communicate between each other</li>
							<li>Speak on forum</li>
							<li>Share articles</li>
							<li>Upload content</li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>

        <a href="{{ url('/auth/register') }}">Register</a>
    </div>
</div>
            </div>
        </div>
    </div>
@stop