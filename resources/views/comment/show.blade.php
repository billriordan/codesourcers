@extends('layouts.default')

@section('content')

<div class="banner" id="frontpage_banner">
Frontpage
</div>

<div class="thread_thumb" id="thread_{{ $comment->id }}">
	<div class="panel panel-default">
        <div class="panel-heading">
        <a href="{{url('user', $comment->user->id)}}">{{$comment->user->name}}</a>
        </div>

        <div class="panel-body"> {{ $comment->description }}</div>
     </div>
</div>

@endsection