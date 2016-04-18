@extends('layouts.app', ['title' => 'Edit Profile'])


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h3>Edit Profile &middot; {{ $user->first_name }}</h3>

                {!! Form::model($user, ['route' => 'account_path', 'method' => 'PATCH', 'files' => true]) !!}

                    <div class="row">
                        <div class="col-md-6 col-md-push-6 text-right">
                            <div class="form-group {{ $errors->has('available_for_hire') ? 'has-error' : '' }}">
                                <label class="control-label text-info">
                                {!! Form::hidden('available_for_help', 0) !!}
                                {!! Form::checkbox('available_for_help', 1) !!} I'm available to help</label>
                                {!! $errors->first('available_for_help', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <fieldset>
                        <legend class="text-warning"><i class="fa fa-lock"></i> Personal Information <a href="#" class="text-warning slider-arrow"><span class="pull-right"><i class="fa fa-chevron-up"></i></span></a></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                    {!! Form::label('username', 'Username', ['class' => 'control-label']) !!}
                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('username', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('year_of') ? 'has-error' : '' }}">
                                    {!! Form::label('year_of', 'Year of Study', ['class' => 'control-label']) !!}
                                    {!! Form::text('year_of', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('year_of', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                    {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('first_name', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                    {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('last_name', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    {!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                                    <span class="help-text">(for the map)</span>
                                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <br>
                    <br>

                    <fieldset class="hide-by-default">
                        <legend class="text-warning"><i class="fa fa-file"></i> Avatar and study details <a href="#" class="text-warning slider-arrow"><span class="pull-right"><i class="fa fa-chevron-down"></i></span></a></legend>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                    {!! Form::label('avatar', 'Profile Image', ['class' => 'control-label']) !!}
                                    {!! Form::file('avatar') !!}
                                    {!! $errors->first('avatar', '<span class="text-danger">:message</span>') !!}
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <br>
                    <br>

                    <fieldset class="hide-by-default">
                        <legend class="text-warning"><i class="fa fa-star"></i> Computing Skills <a href="#" class="text-warning slider-arrow"><span class="pull-right"><i class="fa fa-chevron-down"></i></span></a></legend>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('programming', 'Programming', ['class' => 'control-label']) !!}
                                    {!! Form::selectRange('programming', 1, 100, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('database', 'Database', ['class' => 'control-label']) !!}
                                    {!! Form::selectRange('database', 1, 100, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('frontend', 'Frontend', ['class' => 'control-label']) !!}
                                    {!! Form::selectRange('frontend', 1, 100, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('something', 'Something', ['class' => 'control-label']) !!}
                                    {!! Form::selectRange('something', 1, 100, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block">Save changes</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop