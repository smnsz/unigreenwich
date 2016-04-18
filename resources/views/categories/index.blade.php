@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Categories</div>
				<div class="panel-body">


					<table class="table table-bordered table-striped table-hover">
					    <thead>
					      <tr>
					        <th>Number</th>
					        <th>Name</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach($categories as $category)
						    	<tr>
						        	<td>{{ $category->id }}</td>
						        	<td><a href="{{ route('getCategoryPost',$category->id) }}">{{ $category->name }}</a></td>
						     	</tr>
					    	@endforeach

					    </tbody>
				  	</table>

          		</div>
			</div>
		</div>
	</div>
</div>
@endsection