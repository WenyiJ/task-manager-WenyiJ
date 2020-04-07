<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Group;
use App\Task;

class TaskController extends Controller
{
    public function index(){
        
        $tasks = Task::all();
        // $tasks = Task::latest()->where('group_id', $group->id)->get();

        return view('task',compact('tasks'));
        // $tasks = Task::all();

        // return view('task',['tasks'=>$tasks]);
    }
    // public function create()
    // {
    //     return view('tasks.create');
    // }
    // public function store(Request $request)
    // {
      
    //     $request->validate([
    //         'description' => 'required',
    //         'completed' => 'required',
    //         'due_date' => 'required',
    //         'priority' => 'required',
    //         'flagged' => 'required',
    //     ]);
  
    //     Task::create($request->all());
   
    //     return redirect()->route('task')
    //                     ->with('success','Task created successfully.');
    // }
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
    public function update(Request $request, Task $task){
        // $task = Task::find();
        // $task->completed = request('completed');
        // $task->save();
        // return redirect('/');
        $request->validate([
            
            'completed' => 'required',
            
        ]);
       
        $task->save();
        // return redirect('/');
        // $task->update($request->all());
  
        return redirect()->route('task')
                        ->with('success','Task updated successfully');
    }
    // public function destroy($id){
    //     $task = Task::find($id);
    //     $task->delete();
    //     return redirect('/');
    // }
    public function destroy(Task $task)
    {
        $task->delete();
  
        return redirect()->route('task')
                        ->with('success','Task deleted successfully');
    }
    public function show(Task $task){
        // $tasks = Task::latest()->where('group_id', $group->id)->get();
            $tasks=Task::all();
            return view('task',compact('tasks'));
        // }
        // $task = Task::find();
        // return view('task',['task'=>$task]);
    }
}

