@extends('main')

@section('content')

@if(Auth::user())
	<a href="{{url('/thread/create')}}">
		<div class="create_thread">Create Thread</div>
	</a>
@endif
<div class="col-md-1" style="float:right">
	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu">
			@foreach($tags as $tag)
				<li><a href="#">{{ $tag->name }}</li>
			@endforeach
	  </ul>
</div>
<div class="row">
		<div class="col-md-12 col-md-offset-2">
			@foreach($threads as $thread)
			<div class="row">
				<div class="col-md-8">
					<div class="thread_thumb" id="thread_{{ $thread->id }}">
						<div class="panel panel-default">
			                <div class="panel-heading"><a href="{{url('/thread', $thread->id)}}">{{$thread->name}}</a></div>
		
			                <div class="panel-body"> {{ $thread->description }}</div>

			                <div class="panel-tags">
					        	@foreach($thread->tags as $tag)
									<span class="label label-default">{{ $tag->name }}</span>
					        	@endforeach
							</div>
		    		    </div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
</div>
@endsection