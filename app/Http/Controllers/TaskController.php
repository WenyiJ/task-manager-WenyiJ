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

        return redirect('/group/{{$group->id}}');
    }
    // public function update(Request $request, Task $task){
    //     $task = Task::find();
    //     // $task->completed = request('completed');
    //     // $task->save();
    //     // return redirect('/');
    //     $request->validate([
            
    //         'completed' => 'required',
            
    //     ]);
       
    //     $task->save();
    //     // return redirect('/');
    //     // $task->update($request->all());
  
    //     return redirect()->route('task')
    //                     ->with('success','Task updated successfully');
    // }
    // // public function destroy($id){
    // //     $task = Task::find($id);
    // //     $task->delete();
    // //     return redirect('/');
    // // }
    // public function destroy($id)
    // {   
    //     $task = Task::find($id);
    //     $task->delete();
  
    //     return redirect()->route('task')
    //                     ->with('success','Task deleted successfully');
    // }
    public function update ($id) {
        $task = Task::find($id);
        $task->completed = request('completed');
        $task->save();

        return redirect('/group/{id}');
    }

    public function destroy($id)
    {
        // if(auth()->id() != $task->group_id){
        //     abort(403);}

        // $task->delete();
        $task = Task::find($id);
        $task->delete();

        return redirect('/group/{id}');
   
}
    public function show(Task $task){
        // $tasks = Task::latest()->where('group_id', $group->id)->get();
            // $tasks=Task::all();
            Task::where('group_id',$group->id)->get();
            return view('task',compact('tasks'));
        // }
        // $task = Task::find();
        // return view('task',['task'=>$task]);
    }
}

