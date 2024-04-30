<?php

namespace App\Exports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class MejaExport implements FromView
{
    public function view(): View
    {
        return view('Meja.export', [
            'Meja' => Meja::all()
        ]);
    }
}

