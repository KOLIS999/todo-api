<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();

        return response()->json($todos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $todo = Todo::create([
            'name' => $request->name,
        ]);

        return response()->json($todo, 201);
    }

    public function show(Todo $todo)
    {
        return response()->json($todo);
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $todo->update(['name' => $request->name]);

        return response()->json($todo->refresh());
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json($todo);
    }
}
