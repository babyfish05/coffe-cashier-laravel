<?php

namespace App\Imports;

use App\Models\Meja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Meja::create([
                'nomor_meja' => $row['nomor_meja'],
                'kapasitas' => $row['kapasitas'],
                'status' => $row['status']

            ]);
        }
    }
}
