<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $tags = Tag::all();
        $categories = Category::all();

        $arrayTags = [];
        foreach ($tags as $tag){
            $arrayTags[] =[
                "id" => $tag->id, 
                "value" => $tag->name
            ];
        }

        $arrayCategories = [];
        foreach ($categories as $category) {
            $arrayCategories[] = [
                "id" => $category->id, 
                "value" => $category->name
            ];
        }
        return view('tasks.create', compact('arrayTags', 'arrayCategories'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $nameFile = Storage::disk("public")->put("attachment", $request->attachment);
        
        $task->name = $request->nom;
        $task->ref = bin2hex(random_bytes(12));
        $task->user_id = Auth::user()->id;
        $task->description = $request->desc;
        $task->priority = $request->priority;
        $task->category_id = $request->category;
        $task->attachment = $nameFile;
        $task->begin_date = $request->begin_date . ":00"; // A vérifier avant
        $task->end_date = $request->end_date . "00"; // A vérifier avant
        
        $task->save();
        
        return redirect()->route('tasks');

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
