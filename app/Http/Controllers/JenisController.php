<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\jenisExport;
use App\Imports\jenisImport;
use Barryvdh\DomPDF\Facade\Pdf;
//use itu import class

class JenisController extends Controller //extends inheritance
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Jenis'] = Jenis::all();

        return view('Jenis.index', compact('data'));
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
    public function store(StoreJenisRequest $request)
    {
        $validated = $request->validated();

        Jenis::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jeni)
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
    public function destroy(Jenis $jeni)
    {
        try {
            $jeni->delete();
            return redirect('jenis')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new JenisExport, $date . '_jenis.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new JenisImport, $request->import);  //new itu intance/objek
        return redirect()->back()->with('success', 'import berhasil');
    }
    
    public function generatepdf()
    {
        $Jenis = Jenis::all();
        $pdf = Pdf::loadView('Jenis.jenisPdf', compact('Jenis'));
        return $pdf->download('Jenis.pdf');
    }
}
