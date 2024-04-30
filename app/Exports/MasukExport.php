<?php

namespace App\Exports;

use App\Models\Masuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MasukExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('masuk.export', [
            'Masuk' => Masuk::all()
        ]);
    }
}


