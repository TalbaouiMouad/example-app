<?php

use App\Models\Task;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/',function(){
    $tasks= Task::orderBy('created_at','asc')->get();
    return view('tasks',[
        'tasks'=> $tasks
    ]);
});

Route::post('/tasks',function(Request $request){
  $validator=Validator::make($request->all(),[
      'task'=>'required|max:25'
  ]);
  if($validator->fails()){
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
  }
  $task=new Task();
  $task->name=$request->task;
  $task->save();

  return redirect('/');
});

Route::delete('/task/{id}',function($id){
    Task::findOrFail($id)->delete();
    return redirect('/');
});

Route::put('/{id}',function($id){
    
    return redirect('/');
});
