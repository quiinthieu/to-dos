@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <x-alert/>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('todo.update', $todo)}}" class="form-inline">
                            @csrf
                            @method('patch')
                            <input type="text" name="title" class="form-control" value="{{$todo->title}}" required>
                            <input type="submit" value="Update" class="btn btn-primary ml-3">
                        </form>

                    </div>
                </div>
                <a href="/todos" class="btn btn-dark mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
