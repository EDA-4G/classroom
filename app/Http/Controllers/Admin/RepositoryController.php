<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Department;
use App\Models\RepoDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $description = $request->query('description');
        $docs = RepoDocument::where('description', 'like', '%' . $description . '%')->paginate(5);
        return Inertia::render('admin/repository/Index', compact('docs'));
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
        $document_path = null;
        $document_extension = null;
        if ($request->hasFile('document')) {
            $file_name = rand(0, 9999999) . '-' . $request->file('document')->getClientOriginalName();
            $document_extension = $request->file('document')->getClientOriginalExtension();
            $document_path = $request->file('document')->storeAs('repository', $file_name, 'public');
        }

        $document = new RepoDocument([
            'description' => $request->description,
            'document' => $document_path,
            'extension' => $document_extension,
            'is_active' => $request->is_active
        ]);

        $user = User::find($request->user);
        $document->user()->associate($user);

        $document->save();
        return redirect()->route('admin_repositories.index')->with('success', 'Cadastrado com sucesso!');
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
    public function update(Request $request, RepoDocument $repository)
    {
        $repository->id = $request->input('id');
        $repository->description = $request->input('description');
        $repository->document = $request->input('document');
        $repository->extension = $request->input('extension');
        $repository->is_active = $request->input('is_active');

        $user = User::find($request->input('user'));
        $repository->user()->associate($user);
        $repository->save();

        return redirect()->route('admin_repositories.index')->with('success', 'Actualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RepoDocument $repository)
    {
        $repository->delete();
        return redirect()->route('admin_repositories.index')->with('success', 'Excluído com sucesso!');
    }
}
