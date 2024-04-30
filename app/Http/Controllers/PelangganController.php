<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pelangganExport;
use Illuminate\Http\Request;
use App\Imports\PelangganImport;
use Barryvdh\DomPDF\Facade\Pdf;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Pelanggan'] = Pelanggan::all();
        return view('Pelanggan.index', compact('data'));
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
    public function store(StorePelangganRequest $request)
    {
        $validated = $request->validated();

        Pelanggan::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $Pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $Pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $Pelanggan)
    {
        $validated = $request->validated();
        $Pelanggan->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $Pelanggan)
    {
        try {
            $Pelanggan->delete();
            return redirect('pelanggan')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new pelangganExport, $date . '_Pelanggan.xlsx');
    }
    public function importData(Request $request)
    {
        Excel::import(new PelangganImport, $request->import);
        return redirect()->back()->with('success', 'import berhasil');
    }
    public function generatepdf()
    {
        $Pelanggan = Pelanggan::all();
        $pdf = Pdf::loadView('Pelanggan.pelangganPdf', compact('Pelanggan'));
        return $pdf->download('Pelanggan.pdf');
    }
}
