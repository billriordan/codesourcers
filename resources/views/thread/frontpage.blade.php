@extends('main')

@section('content')

	<div class="title m-b-md">
		<h1>Active Threads<h1>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="sidebar-nav-fixed affix">
					<div class="well">
						<ul class="nav">
							<li class="nav-header">Thread Options</li>
							@if(Auth::user())
								<li><button type="button" class="btn btn-primary" id="createThread" onclick="createThread()">Create Thread</button></li>
							@endif
							<hr/>
							<li class="nav-header">Filter Options</li>
							<li>
							<div class="form-group">
								<form role="form" method="GET" action="sort.blade.php">
									<input type="hidden">			
									<div class="form-group"> 
										<select name="tags[]">
											@foreach($tags as $tag)
												<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
											@endforeach
										</select>
									</div>
									<div>
										<button type="submit" class="btn btn-primary">Sort</button>
									</div>
								</form>
							</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			@foreach($threads as $thread)
				<div class="row">
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
