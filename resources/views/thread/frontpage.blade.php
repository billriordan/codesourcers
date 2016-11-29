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
								<span class="label label-default">{{ $tags[$thread->tag_id -1]->name }}</span>
						</div>
	    		    </div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-md-8" style="text-align: center">
		{{$threads->links()}}
	</div>
</div>

@endsection

<script>
	function createThread(){
		window.location="{{URL::to('/thread/create')}}";
	}
</script>
