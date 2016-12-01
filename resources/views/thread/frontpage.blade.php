@extends('main')

@section('content')

@if(Auth::user())
	<button type="button" class="btn btn-primary" id="createThread" onclick="createThread()">
		Create Thread</button>
@endif
<div style="float:right">
	<form role="form" method="GET" action="frontpage.blade.php">
		<input type="hidden">			
		<div class="form-group"> 
			<select name="tags[]">
				@foreach($tags as $tag)
					<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group"> 
			<select name="tags[]">
					<option value="desc">Most Popular</option>
					<option value="asc">Least Popular</option>
			</select>
		</div>
		<div class="form-group" >
			<div>
				<button type="submit" class="btn btn-primary">Sort</button>
			</div>
		</div>
	</form>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-2">
		@foreach($threads as $thread)
		<div class="row">
			<div class="col-md-8">
				<div class="thread_thumb" id="thread_{{ $thread->id }}">
					<div class="panel panel-default">
		                <div class="panel-heading">
		                <a href="{{url('/thread', $thread->id)}}">{{$thread->name}}</a>
		                <i class="{{$thread->rating($thread->upvotes, $thread->downvotes)}}"></i>
		                </div>
	
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
	<div class="col-md-12" style="text-align: center">
		{{$threads->links()}}
	</div>
</div>

@endsection

<script>
	function createThread(){
		window.location="{{URL::to('/thread/create')}}";
	}
</script>
