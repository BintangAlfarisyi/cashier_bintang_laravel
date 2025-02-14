<?php

namespace App\Imports;

use App\Models\Kategori;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Kategori::create([
                'nama_kategori' => $row['nama_kategori'],
            ]);
        }
    }
}