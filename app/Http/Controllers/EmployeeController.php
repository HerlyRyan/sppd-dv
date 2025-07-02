<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Employee;
use App\Models\FunctionalPosition;
use App\Models\Grade;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create', [
            'grades'    => Grade::all(),
            'agencies'  => Agency::all(),
            'positions' => Position::all(),
            'functional_positions' => FunctionalPosition::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pegawai'              => 'required',
            'position_id'               => 'required',
            'grade_id'                  => 'required',
            'jenis_kelamin'             => 'required',
            'status'                    => 'required',
            'nip'                       => 'required|unique:employees',
            'npwp'                      => 'required',
            'agency_id'                 => 'required',
            'functional_position_id'    => 'required',            
        ]);

        Employee::create($validated);

        User::create([
            'username' => $validated['nip'],
            'password' => $validated['nip'],
            'role'     => $request->role
        ]);

        return redirect()->route('employees.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('pegawai.edit', [
            'grades'    => Grade::all(),
            'positions' => Position::all(),
            'agencies'  => Agency::all(),
            'employee'  => $employee,
            'functional_positions' => FunctionalPosition::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'nama_pegawai'  => 'required',
            'position_id'   => 'required',
            'grade_id'      => 'required',
            'jenis_kelamin' => 'required',
            'status'        => 'required',
            'nip'           => 'required|unique:employees,nip,' .  $employee->id,
            'npwp'          => 'required',
            'agency_id'     => 'required',
            'functional_position_id'    => 'required',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        DB::table('users')
            ->where('username', $employee->nip)
            ->delete();

        return redirect()->route('employees.index')->with('success', 'Data berhasil dihapus');
    }
}
