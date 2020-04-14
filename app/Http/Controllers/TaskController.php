<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Task;
use App\Group;


class TaskController extends Controller
{
    public function index($id){
        $groups = Group::latest()->where('user_id', auth()->id())->get();
        // $group = Group::find($id);
        // $tasks = Task::all();
        $tasks = Task::where('group_id', $id)->get();

        return view('task',compact('tasks','groups'));
    }

public function store(Group $group){
    Task::create([
        'group_id' => $group->id,
        'description' => request('description')
    ]);

    return back();
}
  
public function update (Task $task) {
    $task->completed = request('completed');
    $task->save();
    

    return back();
}

public function destroy(Task $task)
{
    $task->delete();
    return back();
}
    public function show($id){
            $tasks = Task::where('group_id', $id)->get();
            $group = Group::find($id);
            return view('task',compact('tasks','group'));
    }
    
   
}

