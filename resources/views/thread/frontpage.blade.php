@extends('main')

@section('content')

@if(Auth::user())
	<button type="button" class="btn btn-primary" id="createThread" onclick="createThread()">
		Create Thread</button>-
@endif
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

<script>
	function createThread(){
		window.location="{{URL::to('/thread/create')}}";
	}
</script>