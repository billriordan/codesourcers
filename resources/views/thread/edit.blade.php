@extends('main')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Thread</div>
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

					{{ Form::open(['class' => "form-horizontal" , 'method' => 'PATCH', 'url' => ['thread', $thread->id]]) }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Thread Name</label>
							{{ Form::text('name', $thread->name) }}
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tags</label>
							{{ Form::select('tags[]', $tags, null, []) }}
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							{{ Form::textarea('description', $thread->description) }}
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Code Block</label>
							{{ Form::textarea('code_block', $thread->code_block) }}
						</div>

						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="times"> Set Times
                                    </label>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
