<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Task;
use App\Group;


class TaskController extends Controller
{
    public function index(){
        $groups = Group::latest()->where('user_id', auth()->id())->get();
        
        $tasks = Task::all();
        // $tasks = Task::latest()->where('group_id', $group->id)->get();

        return view('task',compact('tasks'));
        // $tasks = Task::all();

        // return view('task',['tasks'=>$tasks]);
    }
   
    public function store(){
        $task = new Task();
        $task->description=request('description');
        $task->completed=request('completed');
        $task->due_date=request('due_date');
        $task->priority=request('priority');
        $task->flagged=request('flagged');
        $task->save();

        return redirect('/group/{{id}}');
    }
    public function update ($id) {
        $task = Task::where('group_id', $id)->get();
        $task->completed = request('completed');
        $task->save();

        return redirect('/group/{{id}}');
    }

    public function destroy($id)
    {
        $task = Task::where('group_id', $id)->get();
        $task->delete();

        return redirect('/task/{id}');
   
}
    public function show($id){
            $tasks = Task::where('group_id', $id)->get();
            return view('task',compact('tasks'));
    }
   
}

