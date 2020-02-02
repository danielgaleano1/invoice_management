<?php

namespace App\Imports;

use App\Invoice;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class InvoicesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'collaborator_id' => $row['Collaborator'],
            'client_id' => $row['Client'],
            'invoice_state_id' => 1,
            'code' => 0,
            'expiration_at' => $row['ExpirationDate'],
            'date_of_receipt' => null,
            'value_tax' => 0,
            'total_value' => 0,
        ]);
    }


    public function rules(): array
    {
        return [
            'Collaborator' => 'required|numeric|exists:collaborators,id',
            'Client' => 'required|numeric|exists:clients,id',
            'ExpirationDate' => 'required|date_format:Y-m-d',
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 250;
    }
}
