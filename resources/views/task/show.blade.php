@extends('layouts.app');
@section('title',$task->task)
@section('content')
    @can('view-task',$task)
    <div class="content">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>{{$task->task}}</h4>
                    <a href="{{route('task.edit',$task->slug)}}" class="btn btn-group btn-warning pull-right'">Edit</a>
                </div>
                <div class="panel-body">
                    {{$task->description}}
                </div>
                <div class="panel-footer"><strong>Category:</strong> {{$task->category}}</div>
            </div>
        </div>
    </div>
    @endcan
    @cannot('view-task',$task)
        <div class="content" style="color:red"><h1>You ara not authorized to use the current page</h1></div>
    @endcannot
@endsection