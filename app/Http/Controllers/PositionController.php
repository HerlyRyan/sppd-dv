<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Position::paginate(5);

        return view('jabatan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan.create', [
            'grades' => Grade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan'  => 'required',
        ]);

        Position::create($validated);

        return redirect()->route('positions.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        $grades = Grade::all();

        return view('jabatan.edit', compact('position', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'nama_jabatan'  => 'required',
        ]);

        $position->update($validated);

        return redirect()->route('positions.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Data berhasil dihapus');
    }
}
