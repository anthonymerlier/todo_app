<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of all the tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::select()->where('user_id', Auth::user()->id)->with("category")->latest()->paginate(9);
        // dd($tasks);
        return view('tasks.tasks', compact('tasks'));
    }

    /**
     * Display all tasks form a specific Category ref @ref
     * 
     * @return \Illuminate\Http\Response Array
     */
    public function indexCategory($ref)
    {
        $category_id = Category::select()->where("ref", $ref)->get()->first();
        $tasks = Task::select()->where('user_id', Auth::user()->id)->where('category_id', $category_id->id)->latest()->paginate(9);
        // dd($tasks);
        return view('tasks.tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($ref)
    {
        $task = Task::select()->where("ref", $ref)->get()->first();
        return view('tasks.task', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
