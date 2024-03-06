<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pemesanan'] = Pemesan::get();
        $jenis = Jenis::with('menu')->get();
        return view('pemesanan.index', compact('data', 'jenis'));
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
    public function store(StorePemesananRequest $request)
    {
        $validated = $request->validated();

        Pemesan::create($validated);
        
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesan $Pemesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesan $Pemesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesan $Pemesan)
    {
        $validated = $request->validated();
        $Pemesan->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('update berhasil'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesan $Pemesan)
    {
        try {
            $Pemesan->delete();
            return redirect('Pemesan')->with('success', 'data berhasil di hapus');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getcode());
        };
    }
}
