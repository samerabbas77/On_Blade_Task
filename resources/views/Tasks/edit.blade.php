
@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
         
   
    
    <form  method="POST" action="{{route('task.update',$task->id)}}" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title :</label>
            <input name="title" type="text" class="form-control" value="{{$task->title}}">

            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('title'))
                        <li>{{  $errors->first('title')}}</li>
                     @endif
                </ul>
            </div>
        @endif

        </div>

        <div class="mb-3">
            <label  class="form-label">Description :</label>
            <input name="description" type="text" class="form-control" value="{{$task->description}} ">      

            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('description'))
                        <li>{{  $errors->first('description')}}</li>
                     @endif
                </ul>
            </div>
        @endif
        </div>
        <div class="mb-3">
            <label  class="form-label">Due Date :</label>
            <input name="due_date" type="date" class="form-control" value="{{$task->due_date}}">

            @if ($errors->any())
            <div class="" style="color: blue">
                <ul>
                    @if ($errors->has('due_date'))
                        <li>{{  $errors->first('due_date')}}</li>
                     @endif
                </ul>
            </div>
            @endif
 
            {{-- <div class="mb-3">
                <label  class="form-label">Status :</label>
                <select name="status" class="form-control">
                    <option value="">Select Status:</option>       
                        <option value="Completed" @selected($task->status == 'Completed') > Completed</option>   
                        <option value="Pending" @selected($task->status == 'Pending') > Pending</option>   
                      
    
                    @if ($errors->any())
                    <div class="" style="color: blue">
                        <ul>
                            @if ($errors->has('status'))
                                <li>{{  $errors->first('status')}}</li>
                             @endif
                        </ul>
                    </div>
                @endif
                </select>
            </div> --}}

        <div class="text-center" style="margin: 10px;">
            <button class="btn btn-primary" >Update</button>
        </div>
        
    </form>


@endsection