@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')
    @can('edit-task',$task)
    <div class="content">
        <div class="col-m-6">

            <form class="form-horizontal" method="post" action="{{route('task.update',$task->slug)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                    <label for="task" class="col-sm-2 control-label">task</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="task" name="task" placeholder="task" value="{{$task->task}}">
                        @if ($errors->has('task'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('task') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label for="category" class="col-sm-2 control-label">Slug</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="category" value="{{$task->slug}}">
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
                        <input type="text" class="form-control" id="category" name="category" placeholder="category" value="{{$task->category}}">
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
                        <textarea class="form-control" id="description" name="description" placeholder="description">{{$task->description}}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-md-5">
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    @endcan
    @cannot('edit-task',$task)
        <div class="content" style="color:red"><h1>You ara not authorized to use the current page</h1></div>
    @endcannot
@endsection