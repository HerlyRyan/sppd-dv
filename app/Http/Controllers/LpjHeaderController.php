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
        $items = LpjHeader::with('lpjDetail')->paginate();

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

    public function show_detail(LpjHeader $lpj_header)
    {
        $lpj_details = LpjDetail::where('lpj_header_id', $lpj_header->id)->get();

        return view('lpj.lpj-detail', compact('lpj_header', 'lpj_details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sppd_id' => 'required|unique:lpj_headers',
            'submission_flag' => 'N',
            'approval_status' => 'N',
        ]);

        $validated['user_id'] = Auth::id();

        $lpj_header = LpjHeader::create($validated);

        return redirect()->route('lpj-header.create-detail', $lpj_header)->with('success', 'LPJ berhasil disimpan');
    }

    public function store_detail(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'biaya_kegiatan' => 'required',
            'bukti_lpj' => 'required|file|mimes:pdf|max:2048'
        ]);

        $path = $request->file('bukti_lpj')->store('lpj', 'public');

        $validated['lpj_header_id'] = $request->lpj_header_id;

        LpjDetail::create([
            'lpj_header_id' => $request->lpj_header_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
            'bukti_lpj' => $path,
        ]);

        // Update the approval_status in LpjHeader to 'N' when a detail is added
        $lpjHeader = LpjHeader::find($request->lpj_header_id);
        if ($lpjHeader) {
            $lpjHeader->update([
                'approval_status' => 'N'
            ]);
        }

        return back()->with('success', 'Detail LPJ berhasil ditambahkan');
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
    public function edit($id)
    {
        $lpj_detail = LpjDetail::find($id);
        return view('lpj.edit-detail', compact('lpj_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_detail(Request $request, LpjDetail $lpj_detail)
    {
        $request->validate([
            'nama_kegiatan' => 'string',
            'biaya_kegiatan' => 'numeric',
            'bukti_lpj' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
        ];

        // Only update the file if a new one is uploaded
        if ($request->hasFile('bukti_lpj')) {
            // Delete old file if exists
            if ($lpj_detail->bukti_lpj && file_exists(storage_path('app/public/' . $lpj_detail->bukti_lpj))) {
                unlink(storage_path('app/public/' . $lpj_detail->bukti_lpj));
            }
            
            // Store the new file
            $data['bukti_lpj'] = $request->file('bukti_lpj')->store('lpj', 'public');
        }

        $lpj_detail->update($data);

        // Update the approval_status in LpjHeader to 'N' when a detail is updated
        $lpjHeader = LpjHeader::find($lpj_detail->lpj_header_id);
        if ($lpjHeader) {
            $lpjHeader->update([
                'approval_status' => 'N'
            ]);
        }

        return back()->with('success', 'Detail LPJ berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LpjHeader $lpjHeader)
    {
        $lpjHeader->delete();

        return redirect()->route('lpj-header.index')->with('success', 'LPJ berhasil dihapus');
    }

    public function submit(LpjHeader $lpj_header)
    {
        $lpj_header->update([
            'submission_flag' => 'Y',
            'submission_date' => now(),
            'reject_reason' => null
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

    public function reject(Request $request, LpjHeader $lpj_header)
    {
        $lpj_header->update([
            'approval_status' => 'R',
            'approval_date' => null,
            'submission_flag' => 'N',
            'submission_date' => null,
            'reject_reason' => $request->reject_reason
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
        $lpjDetail = LpjDetail::find($id);

        if ($lpjDetail) {
            // Delete the PDF file from storage
            if ($lpjDetail->bukti_lpj && file_exists(storage_path('app/public/' . $lpjDetail->bukti_lpj))) {
                unlink(storage_path('app/public/' . $lpjDetail->bukti_lpj));
            }

            // Delete the record from database
            $lpjDetail->delete();
        }

        return back()->with('success', 'Data berhasil dihapus');
    }
}
