<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Task;
class GroupController extends Controller
{
    public function index(){
        $groups = Group::latest()->where('user_id', auth()->id())->get();
        
        return view('home',['groups'=>$groups]);
    }
//     public function store(){
//     $values = request(['name', 'color']);
//     $values['user_id'] = auth()->id();

//     $group = Group::create($values);
//     $group->save();
//     return redirect('/');
// }
public function store() 
    {
        $group = new Group();
        $group->title=request('title');
        $group->color=request('color');
        $group['user_id']=auth()->id();

        $group->save();

        //$task = Task::create(request(['description']));
        
        // $task = Task::create([
            // 'id' => $request->input('id'),
            // 'description' => $request->input('description'),
            // 'completed' => $request->input('completed'),
            // 'due_date' => $request->input('due_date'),
            // 'priority' => $request->input('priority'),
            // 'flagged' => $request->input('flagged')
        // ]);

        return redirect('/');
    }
    public function edit($id){
        $group = Group::find($id);
        return view('group',compact('group'));
    }
    public function update($id){
        $group = Group::find($id);
        $group->title=request('title');
        $group->color=request('color');
        $group['user_id']=auth()->id();
        $group->save();
        return redirect('/');
    }
    public function destroy($id){
        $group = Group::find($id);
        $group->delete();
        $task = Task::where('group_id', $id)->get();
        $task->delete();
        return redirect('/');
    }
    public function show($id){
        $group = Group::find($id);
        // $tasks = Task::latest()->where('group_id', $group->id)->get();
        return view('group',['group'=>$group]);
    }
}

