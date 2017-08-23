<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Auth::user()->tasks()->get();
        return view('task.index', ['tasks' => $result, 'image' => Auth::user()->image]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validator($request->all())->validate();
        if (Auth::user()->tasks()->create($request->all())) {
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('task.edit',compact('task'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $this->editValidator($request->all())->validate();
        if($task->fill($request->all())->save()){
            return $this->show($task);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
      if($task->delete()){
          return $this->index();
      } else {
          dd('Not Deleted');
      }
    }

    private function validator(array $request)
    {
        return Validator::make($request, [
            'task' => 'required',
            'slug' => 'required|alpha_dash|unique:tasks',
            'description' => 'required',
            'category' => 'required'
        ]);
    }
    private function editValidator(array $request){
        return Validator::make($request, [
            'task' => 'required',
            'slug' => 'required|alpha_dash|unique:tasks,user_id,'.Auth::id(),
            'description' => 'required',
            'category' => 'required'
        ]);
    }
}
