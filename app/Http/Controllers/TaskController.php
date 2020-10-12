<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('created_at','DESC')->paginate(3);
        return
            response()->json($tasks);
    }

    public function store(Request $request){
        Task::create($request->all());
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        return
            response()->json($task);
    }

    public function update($id){

        $task = Task::findOrFail($id);
        $task->name = request('name');
        $task->save();

        if($task){
            $tasks = Task::orderBy('created_at','DESC')->paginate(3);
            return
                response()->json($tasks);
        }
    }

    public function delete($id){
        $task = Task::findOrFail($id);
        $task->delete();

        if($task){
            $tasks = Task::orderBy('created_at','DESC')->paginate(3);
            return
                response()->json($tasks);
        }
    }

    public function search(Request $request){
        if($request->search !== null){
            $tasks['data'] = Task::where('name','like','%' . $request->search . '%')->get();
            return
                response()->json($tasks);
        }
        else{
            $tasks = Task::orderBy('created_at','DESC')->paginate(3);
            return
                response()->json($tasks);
        }
    }

}
