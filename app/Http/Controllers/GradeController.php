<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Grade::paginate(5);

        return view('golongan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'golongan'  => 'required',
            'pajak'     => 'required|numeric',
            'gaji_pokok'=> 'required',
            'lama'      => 'required'
        ]);

        Grade::create($validated);

        return redirect()->route('grades.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('golongan.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'golongan'  => 'required',
            'pajak'     => 'required',
            'gaji_pokok'=> 'required',
            'lama'      => 'required'
        ]);

        $grade->update($validated);

        return redirect()->route('grades.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Data berhasil dihapus');
    }
}
