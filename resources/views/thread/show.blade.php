@extends('main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
	
			<div class="row">
				<div class="col-md-8">
					<div class="thread_body" id="thread_{{ $thread->id }}">
						<div class="panel panel-default">
					        <div class="panel-heading">{{$thread->name}}</div>

					        <div class="panel-body"> {{ $thread->description }}</div>
					        	<div class="panel-footer">
									@if($thread->user->is_admin)
										<div class="is_admin" style="background-color: #aaFFcc">admin</div>
									@else
										<div class="is_user">user</div>
									@endif
									<div class="user_name"><a href="{{url('user', $thread->user->id)}}">{{$thread->user->name}}</a></div>
									<div class="stars">
									@foreach($thread->user->stars($thread->user->upvotes, $thread->user->downvotes) as $star)
									<i class="{{$star}}"></i>
									@endforeach
									</div>
									<div class="user_name">{{$thread->user->created_at->timezone('America/Chicago')->toDayDateTimeString()}}</div>
								</div>
							@if(Auth::check())
								<button class="button" onclick="openNav('{{$thread->id}}', 0)">Reply</button>
							@endif
					    </div>
					</div>
				</div>
			</div>
		@if($thread->code_block != "")
			<div class="row">
				<div class="col-md-8">
					<pre><code class="code_block">
						<div class="panel panel-default" style="background-color: #282828; color: #fff">
					        <div class="panel-body"> {{ $thread->code_block }}</div>
					    </div>
					</code></pre>
				</div>
			</div>
		@endif

		<div class="panel-tags">
        	@foreach($thread->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
        	@endforeach
        </div>
	<br>
	
			<div class="row">
				<div class="col-md-6 col-md-offset-1">
				@foreach($thread->comments as $comment)
					<div class="comment_list">
						<div class="comment_thumb" id="comment_{{ $comment->id }}">
							<div class="panel panel-default">
							@if($comment->user->is_admin)
								<div class="panel-heading" style="background-color: #aaFFcc"><a href="{{url('user', $comment->user->id)}}">{{$comment->user->name}}</a></div>
							@else
								<div class="panel-heading"><a href="{{url('user', $comment->user->id)}}">{{$comment->user->name}}</a></div>
							@endif
								<div class="panel-body">
								{{ $comment->description }}
								@if($comment->code_block != "")
										<pre><code class="code_block">
											<div class="panel panel-default" style="background-color: #282828; color: #fff">
										        {{ $comment->code_block }}
										    </div>
										</code></pre>
									@endif
								</div>
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
						@foreach($comment->comments as $comment)
						<div class="shady_stuff" style="display: none">{{ $depth=1 }}</div> <!-- doing some shady stuff here -->
							@include('thread.subcomment', ['depth' => $depth])
						
						<div class="shady_stuff" style="display: none">{{ $depth=0 }}</div>
						@endforeach
					@endif
					@endforeach
				</div>
			</div>
	
		</div>
	</div>
</div>

@if(Auth::user())
	<!-- open comment form -->
	<div id="myNav" class="overlay">
  		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">Create Comment</div>
							<div class="panel-body">
							@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
			
								<form class="form-horizontal" role="form" method="POST" action="{{ route('comment.store') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
									<div class="form-group" hidden>
										{{ Form::text('thread_id') }}
									</div>

									<div class="form-group" hidden>
										{{ Form::text('comment_id') }}
									</div>
			
									<div class="form-group">
										<label class="col-md-4 control-label">Description</label>
										{{ Form::textarea('description') }}
									</div>
			
									<div class="form-group">
										<label class="col-md-4 control-label">Code Block</label>
										{{ Form::textarea('code_block') }}
									</div>
			
									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">Reply</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
@endif

@if(Auth::user())
	@if(Auth::user()->id == $thread->user_id)
		<a href="{{url('/thread/') . '/' . $thread->id . '/edit'}}">
			<div class="edit_thread">Edit Thread</div>
		</a>
	@endif
@endif
<script>
function openNav($thread_id, $comment_id) {
    document.getElementById("myNav").style.width = "100%";
    document.getElementsByName("thread_id")[0].value = $thread_id;
    document.getElementsByName("comment_id")[0].value = $comment_id;
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>

@endsection