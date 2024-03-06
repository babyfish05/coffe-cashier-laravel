<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\produkExport;
use App\Imports\produkImport;
use Barryvdh\DomPDF\Facade\Pdf;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produk'] = produk::all();
        return view('produk.index', compact('data'));
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
    public function store(StoreprodukRequest $request)
    {
        $validated = $request->validated();

        produk::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprodukRequest $request, produk $produk)
    {
        $validated = $request->validated();
        $produk->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        try {
            $produk->delete();
            return redirect('produk')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new produkExport, $date . '_produk.xlsx');
    }
    public function importData(Request $request)
    {
        Excel::import(new produkImport, $request->import);
        return redirect()->back()->with('success', 'import berhasil');
    }
    public function generatepdf()
    {
        $data['produk'] = produk::all();
        $pdf = Pdf::loadView('produk.data', compact('data'));
        return $pdf->download('produk.pdf');
    }
}
