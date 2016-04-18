@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $page_title }}</div>
				<div class="panel-body">

					<div class="tags-container">
							@foreach($tags as $tag)

						        <a class="label {{ $tag_css[ rand(0,3)]}}"  href="{{ route('getTagPost',$tag->id) }}">{{ $tag->name }}</a>
					    	@endforeach
					</div>

          		</div>
			</div>
		</div>
	</div>
</div>
@endsection