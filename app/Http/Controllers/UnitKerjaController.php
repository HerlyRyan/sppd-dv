<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = UnitKerja::paginate(20);

        return view('unit-kerja.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unit-kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_unit_kerja'  => 'required',
        ]);

        UnitKerja::create($validated);

        return redirect()->route('unit_kerja.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $unit_kerja)
    {
        return view('unit-kerja.edit', compact('unit_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $unit_kerja)
    {
        $validated = $request->validate([
            'nama_unit_kerja'  => 'required',
        ]);

        $unit_kerja->update($validated);

        return redirect()->route('unit_kerja.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unit_kerja)
    {
        $unit_kerja->delete();
        return redirect()->route('unit_kerja.index')->with('success', 'Data berhasil dihapus');
    }
}
