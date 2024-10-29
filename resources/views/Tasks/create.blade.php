@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    <form method="POST" action="{{route('task.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label"> Title :</label>
            <input name="title" type="text" class="form-control" value="{{old('title')}}">

            @if ($errors->any())
                <div style="color: blue">
                    <ul>
                        @if ($errors->has('title'))
                            <li>{{  $errors->first('title')}}</li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Description :</label>
            <input name="description" type="text" class="form-control" value="{{old('description')}}">

            @if ($errors->any())
                <div style="color: blue">
                    <ul>
                        @if ($errors->has('description'))
                            <li>{{  $errors->first('description')}}</li>
                        @endif
                    </ul>
                </div>
            @endif    
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date :</label>
            <input name="due_date" type="date" class="form-control" value="{{old('due_date')}}">

            @if ($errors->any())
                <div style="color: blue">
                    <ul>
                        @if ($errors->has('due_date'))
                            <li>{{  $errors->first('due_date')}}</li>
                        @endif
                    </ul>
                </div>
            @endif    
        </div>

        <div class="mb-3">
            <label class="form-label">Status :</label>
            <select name="status" id="" class="form-control">
                <option value="">Select Status:</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed </option>
            </select>

            @if ($errors->any())
                <div style="color: blue">
                    <ul>
                        @if ($errors->has('status'))
                            <li>{{  $errors->first('status')}}</li>
                        @endif
                    </ul>
                </div>
            @endif    
        </div>

        <div class="text-center" style="margin: 10px;" >
            <button class="btn btn-success"  >Submit</button>
        </div>
    </form>

@endsection
