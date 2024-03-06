<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// }
class ProdukExport implements FromView
{
    public function view(): View
    {
        return view('produk.export', [
            'produk' => Produk::all()
        ]);
    }
}

