<?php

namespace App\Http\Controllers;

use App\Models\LpjDetail;
use App\Models\LpjHeader;
use App\Models\Sppd;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LpjHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = LpjHeader::paginate();

        return view('lpj.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lpj.create', [
            'items' => Sppd::where('flag_buat_surat', 'Y')->where('flag_lpj', 'N')->get()
        ]);
    }

    public function create_detail(LpjHeader $lpj_header)
    {
        $lpj_details = LpjDetail::where('lpj_header_id', $lpj_header->id)->get();

        return view('lpj.create-detail', compact('lpj_header', 'lpj_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sppd_id' => 'required|unique:lpj_headers'
        ]);

        $validated['user_id'] = Auth::id();

        $lpj_header = LpjHeader::create($validated);

        return redirect()->route('lpj-header.create-detail', $lpj_header)->with('success', 'LPJ berhasil disimpan');
    }

    public function store_detail(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required',
            'biaya_kegiatan' => 'required',
        ]);

        $validated['lpj_header_id'] = $request->lpj_header_id;

        LpjDetail::create($validated);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(LpjHeader $lpjHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LpjHeader $lpjHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LpjHeader $lpjHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LpjHeader $lpjHeader)
    {
        //
    }

    public function submit(LpjHeader $lpj_header)
    {
        $lpj_header->update([
            'submission_flag' => 'Y',
            'submission_date' => now()
        ]);

        return redirect()->route('lpj-header.index')->with('success', 'LPJ berhasil disubmit');
    }

    public function approve(LpjHeader $lpj_header)
    {
        $lpj_header->update([
            'approval_status' => 'Y',
            'approval_date' => now()
        ]);

        return redirect()->route('lpj-header.index')->with('success', 'LPJ berhasil diapprove');
    }

    public function reject(LpjHeader $lpj_header)
    {
        $lpj_header->update([
            'approval_status' => 'N',
            'approval_date' => now()
        ]);

        return redirect()->route('lpj-header.index')->with('success', 'LPJ berhasil direject');
    }

    public function export(LpjHeader $lpj_header)
    {
        $data = [
            'lpj_header'    => $lpj_header,
            'lpj_details'   => LpjDetail::where('lpj_header_id', $lpj_header->id)->get()
        ];

        $pdf = Pdf::loadView('lpj.lpj', $data);

        $nomor_surat = str_replace('/', '_', $lpj_header->sppd->nomor_surat);

        return $pdf->stream("lpj_$nomor_surat.pdf");
    }

    public static function cek_biaya_rill($id)
    {
        return LpjDetail::where('lpj_header_id', $id)->sum('biaya_kegiatan');
    }

    public function destroy_detail($id)
    {
        LpjDetail::where('id', $id)->delete();

        return back();
    }
}
