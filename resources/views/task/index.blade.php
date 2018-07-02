@extends('layouts.app')

@section('title','Home')
@section('content')
    <div class="content">
        <div class="col-md-9">
            <ul class="list-group ">
                @if(count($tasks))
                    @foreach ($tasks as $task)
                        <li class="list-group-item ">
                            <a class ="secondary-content" href="{{route('task.edit',$task->slug)}}"><span class ="glyphicon glyphicon-pencil"></span></a>
                            <a class="secondary-content" href="{{route('task.show',$task->slug)}}"><span class="glyphicon glyphicon-triangle-right"></span></a>
                            <a class="secondary-content" href="#" onclick="event.preventDefault();
				var del = confirm('Are you sure that you want to delete this task?');
				if(del==true){
				document.getElementById('df-{{$task->id}}').submit();}">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            <form id="df-{{$task->id}}" action="{{route('task.destroy',$task->slug)}}" method="POST" style="display: none;">
                                {{ csrf_field() }}{{ method_field('DELETE') }}
                            </form>

                            {{$task->task}}
                        </li>

                    @endforeach
                @else
                    <li class="list-group-item"> No Task added yet <a href="{{ route('task.create') }}"> click here</a> to add new task. </li>
                @endif
            </ul>
        </div>

        <div class="col-md-3">
            <img class="img-responsive img-circle" src="{{asset('storage/'.$image)}}" width="100px" height="100px">
        </div>
    </div>

@endsection