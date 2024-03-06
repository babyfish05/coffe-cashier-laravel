<?php

namespace App\Imports;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            menu::create([
                'nama_menu' => $row['nama_menu'],
                'harga' => $row['harga'],
                'jenis_id' => $row['jenis_id'],
                'image' => $row['image'],
                'deskripsi' => $row['deskripsi']

            ]);
        }
    }
}
