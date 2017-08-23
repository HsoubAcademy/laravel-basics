@extends('layouts.app')

@section('title','Add new task')

@section('content')

    <div class="row">
        <div class="col-m-6">
            <form class="form-horizontal" method="post" action="{{route('task.store')}}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                    <label for="task" class="col-sm-2 control-label">Task</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="task" name="task" placeholder="Task" value="{{ old('task') }}">
                        @if ($errors->has('task'))
                            <span class="help-block">
							<strong>{{ $errors->first('task') }}</strong>
						</span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label for="slug" class="col-sm-2 control-label">Slug</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ old('slug') }}">
                        @if ($errors->has('slug'))
                            <span class="help-block">
							<strong>{{ $errors->first('slug') }}</strong>
						</span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="col-sm-2 control-label">Category</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="category" name="category" placeholder="category" value="{{ old('category') }}">
                        @if ($errors->has('category'))
                            <span class="help-block">
							<strong>{{ $errors->first('category') }}</strong>
						</span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="category" class="col-sm-2 control-label">Description</label>
                    <div class="col-md-5">
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">

					@endif<strong>{{ $errors->first('description') }}</strong>
					</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-md-5">
                        <button type="submit" class="btn btn-default">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection