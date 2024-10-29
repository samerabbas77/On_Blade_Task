
@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Task Info
        </div>
        <div class="card-body">
            <h5 class="card-title"> Title:  </h5>{{$task->title }}
            <hr>
            <h5><p class="card-text"> Due Date: </h5>{{$task->due_date}} </p>
            <hr>
            <h5><p class="card-text"> Status: </h5>{{$task->status}} </p>
            <hr>
            <h5><p class="card-text"> User Name: </h5>{{$task->user ? $task->user->name : 'not found'}} </p>
            <hr>
            <h5><p class="card-text"> Description: </h5>{{$task->description}}</p>
        </div>

    </div>

    <div class="text-center" style="margin: 10px;">
        <a href=" {{route('task.index',$task->id)}}" class="btn btn-info" style="margin-right: 10px;">Back</a>

    </div>

@endsection