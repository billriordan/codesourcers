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
<div class="thread_list">
	@foreach($threads as $thread)
	<div class="thread_thumb" id="thread_{{ $thread->id }}">
		<div class="panel panel-default">
                    <div class="panel-heading"><a href="{{url('/thread', $thread->id)}}">{{$thread->name}}</a></div>

                    <div class="panel-body"> {{ $thread->description }}
                    </div>
        </div>
	</div>
	@endforeach
</div>
@endsection