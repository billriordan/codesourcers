<div class="subcomment_list" style="padding-left: {{$depth * 2}}%;">
	<div class="comment_thumb" id="subcomment_{{ $comment->id }}">
		<div class="panel panel-default">
		@if($comment->user->is_admin)
			<div class="panel-heading" style="background-color: #aaFFcc"><a href="{{url('user', $comment->user->id)}}">{{$comment->user->name}}</a></div>
		@else
			<div class="panel-heading"><a href="{{url('user', $comment->user->id)}}">{{$comment->user->name}}</a></div>
		@endif
			<div class="panel-body">{{ $comment->description }}</div>
				<div class="panel-footer">
					<div class="stars">
					@foreach($comment->stars($comment->upvotes, $comment->downvotes) as $star)
					<i class="{{$star}}"></i>
					@endforeach
					</div>
					<div class="user_name">{{$comment->created_at->timezone('America/Chicago')->toDayDateTimeString()}}</div>
				</div>
				@if(Auth::check())
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