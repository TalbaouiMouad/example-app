@extends('layouts.app')
@section('content')
 
        <div class="card w-50 mx-auto mt-2">
            <div class="card-header text-center"><h1>Add Task</h1></div>
            <div class="card-body">
                @include('common.errors')
        <form class="form-group" action="/tasks" method="POST">
            @csrf
            <div>
                <label class="form-label" for="task">Insert your Task</label>
                <input class="form-control" type="text" id="task" name="task">
            </div>
            <div >
                <input type="submit" class="btn btn-lg w-100 my-2 btn-primary " value="Add Task"/>
            </div>
        </form>
        </div>
        
    </div>
    <div>
        @if(count($tasks)>0)
        <div class="card mt-3 w-50 mx-auto">
            <div class="card-header text-center">
                <h2>Current Tasks</h2>
            </div>
            <div class="card-body">
                <table class="table table-stripped task-table">
                    <thead>
                        <th class="ps-5">Tasks</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="table-text">
                        <td class="ps-5">{{$task->name}}</td>
                        
                        <td>
                            <form action="/task/{{$task->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delate</button>
                            </form>
                        </td>
                        <td>
                            <form action="/task/{{$task->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success">Done</button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        
        @endif
    </div>
    

@endsection