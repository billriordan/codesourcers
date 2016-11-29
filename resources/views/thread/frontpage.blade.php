@extends('main')

@section('content')

@if(Auth::user())
	<a href="{{url('/thread/create')}}">
		<div class="create_thread">Create Thread</div>
	</a>
@endif
<div class="col-md-1" style="float:right">
	

<<<<<<< HEAD
<form class="form-horizontal" role="form" method="GET" action="sort.blade.php">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group"> 
							<select name="tags[]">
								@foreach($tags as $tag)
									<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group" >
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Sort</button>
							</div>
=======
		                <div class="panel-tags">
								<span class="label label-default">{{ $tags[$thread->tag_id -1]->name }}</span>
>>>>>>> 6d776c6f0ebe7c75765f063fd76dc57b4eb4d818
						</div>
					</form>



	<!--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: gray;">Dropdown Example
	  <span class="caret"></span></button>
	  <ul class="dropdown-menu">
			@foreach($tags as $tag)
				<li><a href="{{url('/', 'sort')}}">{{ $tag->name }}</li>
			@endforeach
	  </ul>-->
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
<div class="row">
	<div class="col-md-8" style="text-align: center">
		{{$threads->links()}}
	</div>
</div>
@endsection