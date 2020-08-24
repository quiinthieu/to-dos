@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-alert/>
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">To-do List</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($todos as $todo)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{--                                    <div class="input-group">--}}
                                    {{--                                        <div class="input-group-prepend">--}}
                                    {{--                                            <div class="input-group-text">--}}
                                    {{--                                                <input type="checkbox" {{$todo->completed ? checked : null}} onclick="{{\Illuminate\Support\Facades\Redirect::to('/todos/edit')}}">--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <input type="text" class="form-control" value="{{$todo->title}}">--}}
                                    {{--                                    </div>--}}
                                    <span>
                                        <form id="{{'form-complete-' . $todo->id}}" class="d-none" method="post"
                                              action="{{route('todo.toggle', $todo->id)}}">
                                            @csrf
                                            @method('put')
                                        </form>
                                        @if($todo->completed)
                                            <input type="checkbox" class="text-success" style="cursor: pointer;"
                                               onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()" checked/>
                                        @else
                                            <input type="checkbox" class="text-muted" style="cursor: pointer;"
                                               onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()" />
                                        @endif
                                        &nbsp;
                                        @if($todo->completed)
                                            <del>{{$todo->title}}</del>
                                        @else
                                            <span>{{$todo->title}}</span>
                                        @endif

                                    </span>

                                    <span>
                                        <a href="{{'/todos/' . $todo->id . '/edit'}}"
                                           class="btn text-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <form class="d-none" id="{{'form-delete-' . $todo->id}}" method="post" action="{{route('todo.delete', $todo->id)}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <i class="fas fa-trash text-danger"
                                           style="cursor: pointer" onclick="event.preventDefault();
                                           if(confirm('Are you sure you want to delete this to-do?')) {
                                               document.getElementById('form-delete-{{$todo->id}}').submit();
                                           }"></i>
                                    </span>
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

