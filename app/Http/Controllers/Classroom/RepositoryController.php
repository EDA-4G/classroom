<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\RepoDocument;
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
        $docs = RepoDocument::where('description', 'like', '%' . $description . '%')->where('is_active', true)
            ->orderBy('created_at', 'desc')->paginate(6);
        $recent_four = $docs->slice(0, 4);
        return Inertia::render('repository/Index', compact('docs', 'recent_four'));
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
