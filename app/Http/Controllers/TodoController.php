<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index')->with(['todos' => $todos]);
    }
    public function create(TodoCreateRequest $request) {
        return view('todos.create');
    }
    public  function edit(Todo $id) {
        return view('todos.edit')->with(['todo' => $id]);
    }
    public function update(TodoCreateRequest $request, Todo $id) {
        $id->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('message', 'Updated successfully!');
    }
    public function toggleCompleted(Request $request, Todo $id) {
        $id->update(['completed' => !$id->completed]);
        return redirect(route('todo.index'))->with('message', $id->completed ? 'Completed!' : 'Uncompleted!');
    }
    public function delete(Todo $id) {
        $id->delete();
        return redirect(route('todo.index'))->with('message', 'Deleted successfully!');
    }
    public function store(TodoCreateRequest $request) {
        auth()->user()->todos()->create($request->all());
        return redirect()->back()->with('message', 'Created successfully!');
    }
}
