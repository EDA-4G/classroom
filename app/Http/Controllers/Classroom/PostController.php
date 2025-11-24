<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->query('title');
        $posts = Post::where('title', 'like', '%' . $title . '%')->paginate(5);
        return Inertia::render('lostFound/Index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deps = Department::where('is_active', true)->get();
        return Inertia::render('lostFound/Create', compact('deps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $file_name = rand(0, 9999999) . '-' . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('post', $file_name, 'public');
        }

        $post = new Post([
            'title' => $request->title,
            'image' => $image_path,
            'type' => $request->type,
            'color' => $request->color,
            'can_pay' => $request->can_pay,
            'is_active' => $request->is_active
        ]);

        $user = User::find($request->user);
        $post->user()->associate($user);

        $department = Department::find($request->department);
        $post->department()->associate($department);

        $post->save();
        return redirect()->route('classrooms.index')->with('success', 'Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $file_name = rand(0, 9999999) . '-' . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('post', $file_name, 'public');
        }

        $post->save();
        $post->id = $request->input('id');
        $post->title = $request->input('title');
        $post->image = $request->input('image');
        $post->type = $request->input('type');
        $post->color = $request->input('color');
        $post->can_pay = $request->input('can_pay');
        $post->is_active = $request->input('is_active');

        $user = User::find($request->input('user'));
        $post->user()->associate($user);
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Actualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Excluído com sucesso!');
    }
}
