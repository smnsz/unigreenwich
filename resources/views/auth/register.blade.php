@extends('layouts.app', ['title' => 'Register'])


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h3>Be part of the community</h3>
                        </div>
                    </div>
                    <div class="panel-body">

                        <form method="POST" action="/auth/register">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                        <label class="control-label" for="username"><span class="text-danger">*</span> Username
                                        </label>
                                        <input type="text" name="username" value="{{ old('username') }}" id="username" class="form-control">
                                        {!! $errors->first('username', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('year_of') ? 'has-error' : '' }}">
                                        <label class="control-label" for="name"><span class="text-danger">*</span> Year of Study</label>
                                        <input type="text" name="year_of" id="year_of" value="{{ old('year_of') }}" class="form-control">
                                        {!! $errors->first('year_of', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                        <label class="control-label" for="first_name"><span class="text-danger">*</span> First Name
                                        </label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="form-control">
                                        {!! $errors->first('first_name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                        <label class="control-label" for="last_name"><span class="text-danger">*</span> Last Name</label>
                                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control">
                                        {!! $errors->first('last_name', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label class="control-label" for="email"><span class="text-danger">*</span> Email Address</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                        <label class="control-label" for="address"><span class="text-danger">*</span> Address</label>
                                        <span class="help-text">(for the map)</span>
                                        <input type="text" name="address" id="address" value="{{ old('address') }}" id="address" class="form-control">
                                        {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label class="control-label" for="password"><span class="text-danger">*</span>  Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                        {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                        <label class="control-label" for="password_confirmation"><span class="text-danger">*</span>  Password Confirmation</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                        {!! $errors->first('password_confirmation', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Register</button>
                            </div>

                        </form>

                        <a href="{{ url('/auth/login') }}">Already have an account? Log in!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    </div>
@stop