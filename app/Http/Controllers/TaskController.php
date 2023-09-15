<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SebastianBergmann\Environment\Console;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        return Task::orderBy('created_at','DESC')->get() ;
    }
    public function completed()
    {
     
         
        return Task::where('completed','=',true)->get();
        
    }
    public function important()
    {
     
         
        return Task::where('important','=',true)->get();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newTask = new Task();
        $newTask->title = $request->input('task.title');
        $newTask->assigned_to = $request->input('task.assigned_to');
        $newTask->task_date = $request->input('task.task_date');
        $newTask->tag = $request->input('task.tag');
        $newTask->important = $request->input('task.important');
        $newTask->description = $request->input('task.description');
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $existingItem = Task::find($id);
       if($existingItem){
           $existingItem->completed = $request->input('task.completed')? true : false;
         
           $existingItem->save();

           return $existingItem;
         
       }
      return 'no task  fount';
    }
 
    public function del(Request $request, $id)
    {
       $existingItem = Task::find($id);
       if($existingItem){
           $existingItem->deleted = $request->input('task.deleted')? true : false;
         
           $existingItem->save();

           return $existingItem;
         
       }
      return 'no task  fount';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Task::find($id);
        if($existingItem){
            $existingItem->delete();
            return 'deleted';
        }
        
    }
}
