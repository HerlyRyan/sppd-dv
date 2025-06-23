<?php

namespace App\Http\Controllers;

use App\Models\FunctionalPosition;
use Illuminate\Http\Request;

class FunctionalPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FunctionalPosition::paginate(5);

        return view('jabatan-fungsional.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan-fungsional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan_fungsional'  => 'required',
        ]);

        FunctionalPosition::create($validated);

        return redirect()->route('functional-positions.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FunctionalPosition $functional_position)
    {
        return view('jabatan-fungsional.edit', compact('functional_position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FunctionalPosition $functional_position)
    {
        $validated = $request->validate([
            'nama_jabatan_fungsional'  => 'required',
        ]);

        $functional_position->update($validated);

        return redirect()->route('functional-positions.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FunctionalPosition $functional_position)
    {
        $functional_position->delete();

        return redirect()->route('functional-positions.index')->with('success', 'Data berhasil dihapus');
    }
}
