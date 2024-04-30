<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\stokExport;
use App\Imports\StokImport;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use Mockery\Expectation;

class stokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = stok::all();
        try{
         $data['stok'] = stok::with(['menu'])->get();
         $data['menu'] = Menu::get();
         
         return view('stok.index')->with($data);
        } catch(QueryException | Expectation | PDOException $error){
            return redirect()->back()->withErrors(['message' => $error->getMessage()]);
        }
        // $data['stok'] = stok::all();
        // return view('stok.index', compact('data'));
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
    public function store(StorestokRequest $request)
    {
        $validated = $request->validated();

        stok::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestokRequest $request, stok $jeni)
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
    public function destroy(stok $stok)
    {
        try {
            $stok->delete();
            return redirect('stok')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new stokExport, $date.'_stok.xlsx');
    }
    public function importData(Request $request)
    {
        Excel::import(new StokImport, $request->import);
        return redirect()->back()->with('success', 'import berhasil');
    }
    public function generatepdf()
    {
        $Stok = Stok::all();
        $pdf = Pdf::loadView('Stok.stokPdf', compact('Stok'));
        return $pdf->download('Stok.pdf');
    }

}
