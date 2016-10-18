@extends('layouts.default')

@section('content')

<div class="banner" id="frontpage_banner">
Frontpage
</div>
<div class="thread_list">
	@foreach($threads as $thread)
	<div class="thread_thumb" id="thread_{{ $thread->id }}">
		<div class="panel panel-default">
                    <div class="panel-heading">{{ $thread->name }}</div>

                    <div class="panel-body"> information about the thread
                    </div>
        </div>
	</div>
	@endforeach
</div>
@endsection