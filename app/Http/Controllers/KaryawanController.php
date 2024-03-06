<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Http\Requests\StorekaryawanRequest;
use App\Http\Requests\UpdatekaryawanRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\karyawanExport;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['karyawan'] = karyawan::all();
        return view('karyawan.index', compact('data'));
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
    public function store(StorekaryawanRequest $request)
    {
     try {
            $validated = $request->validated();
            DB::beginTransaction();
            // DB::table('karyawan')->insert($validated);
            // dd($request->file('foto'));
            $foto = $request->file('foto');
            DB::commit(); //nyimpan data ke database
            $foto->storeAS('foto', $foto->getClientOriginalName());
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('karyawan')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekaryawanRequest $request, karyawan $karyawan)
    {
        $validated = $request->validated();
        $karyawan->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        try{
        $karyawan->delete();
        return redirect('karyawan')->with('success', 'data berhasil di hapus');
    }catch(QueryException | Exception | PDOException $error){
        $this->failResponse($error->getMessage(), $error->getcode());
    }
    }

    public function export()
    {
        $date = date('Y-m-d');
        return Excel::download(new karyawanExport, $date.'_karyawan.xlsx');
    }

}