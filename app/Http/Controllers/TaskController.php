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
    // public function store($id){
        
    //     // $group = Group::find($id);
    //     // $task = new Task();
    //     // $task->description=request('description');
    //     // $task->completed=request('completed');
    //     // $task->due_date=request('due_date');
    //     // $task->priority=request('priority');
    //     // $task->flagged=request('flagged');
        
    //     // $tasks = Task::where('group_id', $id)->get();
       
    //     // $task->save();

    //     // return redirect('/group/{id}');
    //     $group = Group::find($id);
    //     $task = new Task();
        
    //     // request()->validate([
    //     //     'description' => 'required'
    //     // ]);
        
    //     $values = request(['description']);
    //     $values['group_id'] = $id;
            
    //     $task = Task::create($values);
    //     // $task->description = request('description');
    //     $task->save();
    //     // $task = Task::create(request(['description']));
        
    //     // $task = Task::create([
    //         // 'id' => $request->input('id'),
    //         // 'description' => $request->input('description'),
    //         // 'completed' => $request->input('completed'),
    //         // 'due_date' => $request->input('due_date'),
    //         // 'priority' => $request->input('priority'),
    //         // 'flagged' => $request->input('flagged')
    //     // ]);

    //     return redirect('/group/{id}');
    // }
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

