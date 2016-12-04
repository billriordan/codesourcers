@extends('main')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Create Thread</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ route('thread.store') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Thread Name</label>
							{{ Form::text('name') }}
						</div>
						
						<div class="form-group"> 
							<label class="col-md-4 control-label">Tags</label>
							<select name="tags[]">
								@foreach($tags as $tag)
									<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="wysiwyg">
								<textarea class="input-block-level" id="summernote" name="description" rows="18" cols="18">
								</textarea>
							</div>
							<script type="text/javascript">
							$(document).ready(function() {
							  $('#summernote').summernote(
							  	{
							  		width: 400,
							  		height: 250,
							  	});
							});
							</script>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Code Block</label>
							{{ Form::textarea('code_block') }}
						</div>

						<script type="text/javascript" src="{{ asset('/summernote-0.8.2-dist/dist/summernote.min.js') }}"></script>
						<script src="{!!Html::style('/summernote-0.8.2-dist/dist/summernote.css')!!}"></script>

						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox" id="checkbox">
                                    <label>
                                        <input type="checkbox" name="times" onclick="toggle()"> Set Times
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="start_time" style="display: none">
							<label class="col-md-4 control-label">Start Time</label>
							<input type="datetime-local" name="start_date">
						</div>

						<div class="form-group" id="end_time" style="display: none">
							<label class="col-md-4 control-label">End Time</label>
							<input type="datetime-local" name="end_date">
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Create</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
function toggle() {
	if(document.getElementById('start_time').style.display == "inline")
	{
		document.getElementById("start_time").style.display = "none";
		document.getElementById("end_time").style.display = "none";
	}
	else
	{
		document.getElementById("start_time").style.display = "inline";
		document.getElementById("end_time").style.display = "inline";
	}
}
</script>

@endsection