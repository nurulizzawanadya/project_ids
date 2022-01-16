<?php

namespace App\Imports;

use App\Models\Customer2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerImport implements 
        ToModel, 
        WithHeadingRow, 
        SkipsOnError, 
        WithBatchInserts, 
        SkipsOnFailure, 
        WithValidation
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Customer2 ([
            'id_customer_import' => $row['id_customer'],
            'nama_customer_import' => $row['nama'],
            'alamat_customer_import' => $row['alamat'],
            'kode_pos_import' => $row['kodepos'],
        ]);
    }
        
    public function batchSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            '*.id_customer_import' => ['unique:customer_import,id_customer_import']
        ];
    }
}
