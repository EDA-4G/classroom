<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $description = $request->query('description');
        $rooms = Classroom::where('description', 'like', '%' . $description . '%')->paginate(5);
        $deps = Department::where('is_active', true)->get();
        return Inertia::render('admin/classroom/Index', compact('rooms', 'deps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $file_name = rand(0, 9999999) . '-' . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('classroom', $file_name, 'public');
        }

        $classroom = new Classroom([
            'description' => $request->description,
            'image' => $image_path,
            'level' => $request->level,
            'status' => $request->status,
            'is_fixed' => $request->is_fixed,
            'is_active' => $request->is_active
        ]);

        $department = new Department([
            'id' => $request->department
        ]);
        $classroom->department()->associate($department);

        $classroom->save();
        return redirect()->route('admin_classrooms.index')->with('success', 'Cadastrado com sucesso!');
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
    public function update(Request $request, Classroom $classroom)
    {
        $classroom->id = $request->input('id');
        $classroom->description = $request->input('description');
        $classroom->image = $request->input('image');
        $classroom->level = $request->input('level');
        $classroom->status = $request->input('status');
        $classroom->is_fixed = $request->input('is_fixed');
        $classroom->is_active = $request->input('is_active');
        $classroom->save();

        return redirect()->route('admin_classrooms.index')->with('success', 'Actualizado com sucesso!');
    }

    public function cover(Request $request, Classroom $classroom)
    {
        $image_path = null;
        if ($request->hasFile('image')) {
            $file_name = rand(0, 9999999) . '-' . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('classroom', $file_name, 'public');
        }

        $classroom->image = $image_path;
        $classroom->save();
        return redirect()->route('admin_classrooms.index')->with('success', 'Image actualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('admin_classrooms.index')->with('success', 'Excluído com sucesso!');
    }
}
