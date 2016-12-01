<div class="subcomment_list" style="padding-left: {{$depth * 2}}%;">
	<div class="comment_thumb" id="subcomment_{{ $comment->id }}">
	@if($thread->user_id == $comment->user->id)
		<div class="panel panel-info">
	@elseif($comment->user->is_admin)
		<div class="panel panel-warning">
	@else
		<div class="panel panel-default">
	@endif
			<div class="panel-heading">
			<a href="{{url('user', $comment->user->id)}}">{{$comment->user->name}}</a>
			<i class="{{$comment->user->rating($comment->user->upvotes, $comment->user->downvotes)}}"></i>
			@if(Auth::check() && (Auth::user()->id == $comment->user->id))
			<div class="delete_button" style="float:right">
				{{ Form::open(['url' => 'comment/' . $comment->id , 'method' => 'delete']) }}
				{{ Form::submit('Delete Comment', ['class' => 'btn btn-fail']) }}
				{{ Form::close() }}
			</div>
			@endif
			</div>
			<div class="panel-body">{{ $comment->description }}</div>
				<div class="panel-footer">
					<div class="user_name">{{$comment->created_at->toDayDateTimeString()}}</div>
				</div>
				@if(Auth::check() && ($thread->end_date > \Carbon\Carbon::now() || !isset($thread->end_date)))
					<button class="button" onclick="openNav('{{$thread->id}}', '{{$comment->id}}')">Reply</button>
				@endif
		</div>
	</div>
</div>
@if($comment->comments)
<div class="shady_stuff" style="display: none">{{ $depth = $depth +1 }}</div>
	@foreach($comment->comments as $comment)
		@include('thread.subcomment', ['depth' => $depth])
	@endforeach
<div class="shady_stuff" style="display: none">{{ $depth = $depth -1 }}</div>
@endif