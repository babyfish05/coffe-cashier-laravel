<?php

namespace App\Exports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// }
class JenisExport implements FromView
{
    public function view(): View
    {
        return view('jenis.export', [
            'jenis' => Jenis::all()
        ]);
    }
}

