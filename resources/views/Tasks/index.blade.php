@extends('layouts.app')
@section('title') Index @endsection
@section('content')


  <nav class="navbar navbar-light justify-content-center fs-3 mb-2  " style="background-color: #00ff5573">
      <div class="text-center ">
       
        <a href="{{route('task.create')}}" class="btn btn-success">Create Task</a>
      
        
      </div>  
           
        </nav> 
    
    

<nav class="navbar navbar-light justify-content-center fs-3 mb-2" style="background-color: #00ff5573">
     <h1> Tasks List </h1> 
           
</nav  >
<header class="d-flex justify-content-between my4"> </header>
<nav style="background-color: #00ff5573">
    <form action="{{route('task.search')}}" method="get">
        @csrf
        <input type="text" autocomplete="off" name="search" class="input mb-3" placeholder="Enter task title.." style="margin-right: 10px;">
        <input type="submit" autocomplete="off" name="text" class="btn btn-success" value="Search"> 
    </form>
    
</nav> 
</header>



<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">N.</th>
      <th scope="col">Title</th>
      
      <th scope="col">Due Date</th>
      <th scope="col">State</th>
      <th scope="col">User Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr>
    @php ($i = 0)
   
          @foreach($tasks as $task)
              <td> {{++$i}}</td>

              <td>{{$task->title}}</td>


              <td>{{$task->due_date}}</td>

              <td>{{$task->status}}</td>

              <td>{{$task->user ? $task->user->name : 'not found'}}</td>
             
              <td>
                  @can('view',$task)  
                  <a href="{{route('task.edit',$task->id)}}" class="btn btn-warning"style="margin-right: 10px;">Edit</a>  
                  
                  <a href=" {{route('task.show',$task->id)}}" class="btn btn-info" style="margin-right: 10px;">Read More</a>

                  {{-- Change Status Form  --}}
                  <form action="{{ route('task.changeStatus', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-info" style="margin-right: 10px;">
                        Change Status
                    </button>
                </form>
                
                 
                   {{-- Delete Form  --}}
                  <form style="display: inline;" method="POST" action="{{route('task.destroy',$task->id)}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Delete  the selected  Record permanently?' )">Delete</button>
                  </form>
                  @endcan
            </td>
            </tr>
          @endforeach
  </tbody>
</table>
@if (Session::has('message'))
<div class="alert alert-info">
  {{ Session::get('message') }}
</div>
@endif  

  @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
 @endif
    @if (\Session::has('successDelete'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('successDelete') !!}</li>
        </ul>
    </div>
    @endif
@endsection

