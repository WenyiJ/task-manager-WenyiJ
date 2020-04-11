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
        $uncompleted = array_filter($tasks->toArray(), function ($task) {

            return $task['completed'] === 0;
  
     });
        return view('task',compact('tasks'));
    }
   
    public function store(Group $group){
    //     $task = new Task();
    //     $task->description=request('description');
    //     $task->completed=request('completed');
    //     $task->due_date=request('due_date');
    //     $task->priority=request('priority');
    //     $task->flagged=request('flagged');

    //     $tasks = Task::where('group_id', $id)->get();
    //     $uncompleted = array_filter($tasks->toArray(), function ($task) {

    //         return $task['completed'] === 0;
  
    //  });
    //     $task->save();

    //     return redirect('/group/{id}');
    Task::create([
        'group_id'=>$group->id,
        'description'=>request('description')
    ]);
    return back();
    }
//     public function update ($id) {
//         $task = Task::where('group_id', $id)->get();
//         $group = Group::find($id);
//         $task->completed = request('completed');
//         $task->save();
//         $group->save();
//         // return redirect('/task');
//         return redirect('/group/{id}');
//     }

//     public function destroy($id)
//     {
//         $task = Task::where('group_id', $id)->get();
//         $group = Group::find($id);
//         $task->delete();
//         return redirect('/group/{id}');
//         // return redirect('/task/{{$id}}');
   
// }
public function update ($id) {

        
    $task = Task::find($id);
    $task->completed = request('completed');
    $task->save();
    

    return back();
}

public function destroy($id)
{

    
    $task = Task::find($id);
    $task->delete();

    return redirect('/group/{id}');
}
    public function show($id){
            $tasks = Task::where('group_id', $id)->get();
            $group = Group::find($id);
            $uncompleted = array_filter($tasks->toArray(), function ($task) {

                return $task['completed'] === 0;
      
         });
            return view('task',compact('tasks'));
    }
    
   
}

