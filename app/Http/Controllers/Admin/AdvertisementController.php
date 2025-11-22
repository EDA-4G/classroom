<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $description = $request->query('description');
        $ads = Advertisement::where('description', 'like', '%' . $description . '%')->paginate(5);
        // dd($advertisements);
        return Inertia::render('admin/Index', compact('ads'));
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
            $image_path = $request->file('image')->storeAs('ads', $file_name, 'public');
        }

        $advertisement = new Advertisement([
            'description' => $request->description,
            'image' => $image_path,
            'is_active' => $request->is_active
        ]);

        $advertisement->save();
        return redirect()->route('advertisements.index')->with('success', 'Cadastrado com sucesso!');
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
    public function edit(Advertisement $advertisement)
    {
        return Inertia::render('admin/Index', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $advertisement->id = $request->input('id');
        $advertisement->description = $request->input('description');
        $advertisement->image = $request->input('image');
        $advertisement->is_active = $request->input('is_active');
        $advertisement->save();

        return redirect()->route('advertisements.index')->with('success', 'Actualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('advertisements.index')->with('success', 'Excluído com sucesso!');
    }
}
