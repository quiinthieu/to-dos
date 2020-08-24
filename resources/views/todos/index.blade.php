@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">To-do List</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($todos as $todo)
                                <li class="list-group-item">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" {{$todo->completed ? checked : null}} onclick="{{\Illuminate\Support\Facades\Redirect::to('/todos/edit')}}">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="{{$todo->title}}">
                                    </div>
                                </li>
                            @endforeach
                            @include('todos.create')
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

