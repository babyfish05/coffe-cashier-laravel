<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// }
class PelangganExport implements FromView
{
    public function view(): View
    {
        return view('Pelanggan.export', [
            'Pelanggan' => Pelanggan::all()
        ]);
    }
}

