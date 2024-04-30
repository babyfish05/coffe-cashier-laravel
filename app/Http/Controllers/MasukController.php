<?php

namespace App\Http\Controllers;

use App\Models\masuk;
use App\Http\Requests\StoremasukRequest;
use App\Http\Requests\UpdatemasukRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MasukExport;
use App\Imports\masukImport;
use Barryvdh\DomPDF\Facade\Pdf;

//use itu import class
class masukController extends Controller //extends itu inheritance
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['masuk'] = masuk::all();
        return view('masuk.index', compact('data'));
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
    public function store(StoremasukRequest $request)
    {
        $validated = $request->validated();

        masuk::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(masuk $masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(masuk $masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemasukRequest $request, masuk $masuk)
    {
        $validated = $request->validated();
        $masuk->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(masuk $masuk)
    {
        try {
            $masuk->delete();
            return redirect('masuk')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());  //logic application try and catch
        }
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new masukExport, $date . '_masuk.xlsx'); // new itu intance / objek
    }
    // public function importData(Request $request)
    // {
    //     Excel::import(new masukImport, $request->import);
    //     return redirect()->back()->with('success', 'import berhasil');
    // }
    public function generatepdf()
    {
        $data['masuk'] = masuk::all();
        $pdf = Pdf::loadView('masuk.data', compact('data'));
        return $pdf->download('masuk.pdf');
    }
}
