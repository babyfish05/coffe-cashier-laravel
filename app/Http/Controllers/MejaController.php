<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;
use Illuminate\Http\Request;
use App\Imports\MejaImport;
use Barryvdh\DomPDF\Facade\Pdf;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Meja'] = Meja::all();
        return view('Meja.index', compact('data'));
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
    public function store(StoreMejaRequest $request)
    {
        $validated = $request->validated();

        Meja::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $Meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $Meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $Meja)
    {
        $validated = $request->validated();
        $Meja->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $Meja)
    {
        try {
            $Meja->delete();
            return redirect('Meja')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date . '_Meja.xlsx');
    }
    public function importData(Request $request)
    {
        Excel::import(new MejaImport, $request->import);
        return redirect()->back()->with('success', 'import berhasil');
    }
    public function generatepdf()
    {
        $data['Meja'] = Meja::all();
        $pdf = Pdf::loadView('Meja.data', compact('data'));
        return $pdf->download('Meja.pdf');
    }
}
