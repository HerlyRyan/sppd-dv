<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Agency::paginate(20);

        return view('instansi.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'instansi'  => 'required',
        ]);

        Agency::create($validated);

        return redirect()->route('agencies.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        return view('instansi.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $validated = $request->validate([
            'instansi'  => 'required',
        ]);

        $agency->update($validated);

        return redirect()->route('agencies.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirect()->route('agencies.index')->with('success', 'Data berhasil dihapus');
    }
}
