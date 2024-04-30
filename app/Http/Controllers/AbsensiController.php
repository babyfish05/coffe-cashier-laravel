<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\absensiExport;
use App\Imports\absensiImport;
use Barryvdh\DomPDF\Facade\Pdf;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['absensi'] = Absensi::all();

        return view('absensi.index', compact('data'));
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
    public function store(StoreabsensiRequest $request)
    {
        $validated = $request->validated();

        Absensi::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $Absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $Absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $jeni)
    {
        $validated = $request->validated();
        $jeni->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $jeni)
    {
        try {
            $jeni->delete();
            return redirect('absensi')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    // public function export()
    // {
    //     $date = date('Y-m-d');
    //     return Excel::download(new absensiExport, $date . '_absensi.xlsx');
    // }
    // public function importData(Request $request)
    // {
    //     Excel::import(new absensiImport, $request->import);
    //     return redirect()->back()->with('success', 'import berhasil');
    // }
    // public function generatepdf()
    // {
    //     $data['absensi'] = absensi::all();
    //     $pdf = Pdf::loadView('absensi.data', compact('data'));
    //     return $pdf->download('absensi.pdf');
    // }
}
