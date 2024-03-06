<?php

namespace App\Exports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class MenuExport implements FromCollection
// {
//     /**
//      * @return \Illuminate\Support\Collection
//      */
//     public function collection()
//     {
//         return Menu::get();
//     }
//     public function headings(): array
//     {
//         return view('menu.export', [
//             'menu' => menu::all()
//         ]);
//     }
// }
class MenuExport implements FromView
{
    public function view(): View
    {
        return view('menu.export', [
            'menu' => menu::all()
        ]);
    }
}

