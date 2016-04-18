@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit post</div>
				<div class="panel-body">

					@include('form.post',array('route' => 'postPostUpdate'))

          		</div>
			</div>
		</div>
	</div>
</div>
@endsection