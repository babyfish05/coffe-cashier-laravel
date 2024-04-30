<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Jenis;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Exception;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Database\QueryException;
use PDOException;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

//use itu import class

class MenuController extends Controller //extends inheritance
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('jenis')->get();
        $jenis = jenis::all();

        return view('menu.index', compact('jenis', 'menu'));
        // try {
        //     $menu = Menu::latest()->get();
        //     $jenis = Jenis::pluck('nama_jenis', 'id');
        //     return view('menu.index', compact('menu', 'jenis'));
        // } catch (QueryException | Exception | PDOException $error) {
        //     // $this->failResponse($error->getMessage(), $error->getCode());
        //     dd($error->getMessage());
        // }
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
    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create($request->all());
        // Mendapatkan file yang diunggah oleh pengguna
        $file = $request->file('image');

        // Menyimpan file gambar ke direktori penyimpanan 'menu' dengan nama yang unik
        $file_name = $file->getClientOriginalName(); // Nama file asli
        $file_path = $file->storeAs('menu', $file_name); // Simpan file dengan nama unik di direktori 'menu'

        // Simpan nama file ke dalam kolom image di database
        $menu->image = $file_path;
        $menu->save();

        return redirect('menu')->with('success', 'Data menu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($menu->image) {
                Storage::delete($menu->image);
            }
            $validated['image'] = $request->file('image')->store('publik/menu');
        }
        $menu->update($validated);
        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('menu')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        }
        //logic application try catch
    }
    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . '_Menu.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MenuImport, $request->import);
        return redirect()->back()->with('success', 'import berhasil'); //new itu intace / objek
    }
    public function generatepdf()
    {
        $menu = menu::all();
        $pdf = Pdf::loadView('menu.menuPdf', compact('menu'));
        return $pdf->download('menu.pdf');
    }
}
