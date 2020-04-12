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
//    public function store($id){
//     $tasks = Task::where('group_id', $id)->get();
//     $group = Group::find($id);
//     $task = Task::find($id);
//     $task->description=request('description');
//        return back();
//    }

public function store(Group $group){
    // $tasks = Task::where('group_id', $id)->get();
    // $group = Group::find($id);
    // 'group_id'=>$group->id;
    Task::create([
        'group_id' => $group->id,
        'description' => request('description')
    ]);

    return back();
}
  
public function update (Task $task) {

        
    // $task = Task::find($id);
    $task->completed = request('completed');
    $task->save();
    

    return back();
}

public function destroy(Task $task)
{

    // $group = Group::find($id);
    // $task = Task::find($id);
    $task->delete();
    return back();
    // return redirect('/group/{id}');
}
    public function show($id){
            $tasks = Task::where('group_id', $id)->get();
            $group = Group::find($id);
        //     $uncompleted = array_filter($tasks->toArray(), function ($task) {

        //         return $task['completed'] === 0;
      
        //  });
            return view('task',compact('tasks','group'));
    }
    
   
}

