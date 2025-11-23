<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $description = $request->query('description');
        $dps = Department::where('description', 'like', '%' . $description . '%')->paginate(5);
        return Inertia::render('admin/department/Index', compact('dps'));
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
        $advertisement = new Department([
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);

        $advertisement->save();
        return redirect()->route('admin_departments.index')->with('success', 'Cadastrado com sucesso!');
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
    public function update(Request $request, Department $department)
    {
        $department->id = $request->input('id');
        $department->description = $request->input('description');
        $department->is_active = $request->input('is_active');
        $department->save();

        return redirect()->route('admin_departments.index')->with('success', 'Actualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin_departments.index')->with('success', 'Excluído com sucesso!');
        // return redirect()
        //     ->route('admin_departments.index')
        //     ->with('success', 'Excluído com sucesso!')
        //     ->withQueryString();
    }
}
