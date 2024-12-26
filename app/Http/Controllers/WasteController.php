<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waste;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wastes = Waste::paginate(10);
        return view('wastes.index', compact('wastes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wastes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Waste::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->route('wastes.index')->with('success', 'Waste data successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $waste = Waste::findOrFail($id);
        return view('wastes.show', compact('waste'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $waste = Waste::findOrFail($id);
        return view('wastes.edit', compact('waste'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $waste = Waste::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $waste->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->route('wastes.index')->with('success', 'Waste data successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $waste = Waste::findOrFail($id);
        $waste->delete();

        return redirect()->route('wastes.index')->with('success', 'Waste data successfully deleted.');
    }
}
