<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\categoryExport;
use Illuminate\Http\Request;
use App\Imports\categoryImport;
use Barryvdh\DomPDF\Facade\Pdf;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['category'] = category::all();
        return view('category.index', compact('data'));
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
    public function store(StorecategoryRequest $request)
    {
        $validated = $request->validated();

        category::create($validated);

        return redirect()->back()->with('success', 'import berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        try {
            $category->delete();
            return redirect('category')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
    }
    // public function export()
    // {
    //     $date = date('Y-m-d');
    //     return Excel::download(new categoryExport, $date . '_category.xlsx');
    // }
    // public function importData(Request $request)
    // {
    //     Excel::import(new categoryImport, $request->import);
    //     return redirect()->back()->with('success', 'import berhasil');
    // }
    public function generatepdf()
    {
        $data['category'] = category::all();
        $pdf = Pdf::loadView('category.data', compact('data'));
        return $pdf->download('category.pdf');
    }
}
