<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\Query;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDOException;





class TransaksiController extends Controller
{
    public function store(TransaksiRequest $request)
    {

        try {
            $validated = $request->validated();

            $last_id = Transaksi::where('tanggal', date('Ymd'))->orderBy('created_at', 'desc')->select('id')->first();


            $noTrans = $last_id == null ? date('Ymd') . '0001' : date('Ymd') . sprintf('%04d', substr($last_id->id, 8, 4) + 1);
            DB::beginTransaction();
            $insertTransaksi = Transaksi::create([
                'id' => $noTrans,
                'tanggal' => date('Ymd'),
                'total_harga' => $validated['total'],
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);

            // input detail transaksi
            foreach ($request['orderedList'] as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $noTrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty'] // Fixing this line
                ]);
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pemesanan berhasil', 'notrans' => $noTrans]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Pemesanan gagal', 'error' => $e->getMessage()]);
        }
    }

    public function faktur($nofaktur)
    {

        $transaksi = Transaksi::findOrFail($nofaktur);
        return view('cetak.faktur', compact('transaksi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
