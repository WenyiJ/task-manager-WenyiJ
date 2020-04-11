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
public function store() 
    {
        $group = new Group();
        $group->title=request('title');
        $group->color=request('color');
        $group['user_id']=auth()->id();
        $group->save();
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
        return view('group',['group'=>$group]);
    }
}

