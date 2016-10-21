@extends('layouts.default')

@section('content')

<div class="banner" id="frontpage_banner">
Drink From the Hose
</div>
<div class="container">
	<div class="thread_list">
		@foreach($comments as $comment)
		<div class="col-md-4">
			<div class="thread_thumb" id="thread_{{ $comment->thread->id }}">
				<div class="panel panel-default">
    		                <div class="panel-heading"><a href="{{url('/thread', $comment->thread->id)}}">{{$comment->thread->name}}</a></div>

    		                <div class="panel-body">{{ $comment->description }}</div>
    		    </div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection