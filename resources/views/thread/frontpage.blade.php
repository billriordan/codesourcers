@extends('layouts.default')

@section('content')

<div class="banner" id="frontpage_banner">
Frontpage
</div>
@if(Auth::user())
	<a href="{{url('/thread/create')}}">
		<div class="create_thread">Create Thread</div>
	</a>
@endif
<div class="row">
	<div class="col-md-12 col-md-offset-2">
		@foreach($threads as $thread)
		<div class="row">
			<div class="col-md-8">
				<div class="thread_thumb" id="thread_{{ $thread->id }}">
					<div class="panel panel-default">
	    		                <div class="panel-heading"><a href="{{url('/thread', $thread->id)}}">{{$thread->name}}</a></div>
			
	    		                <div class="panel-body"> {{ $thread->description }}
	    		                </div>
	    		    </div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection