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
            'invoice_state_id' => $row['State'],
            'code' => $row['Code'],
            'expiration_at' => $row['Expiration Date'],
            'date_of_receipt' => $row['Receipt Date'],
            'value_tax' => 0,
            'total_value' => 0,
        ]);
    }


    public function rules(): array
    {
        return [
            
            'Collaborator' => 'required|numeric|exists:collaborators,id',
            'Client' => 'required|numeric|exists:clients,id',
            'State' => 'required|numeric|exists:invoice_states,id',
            'Code' => ['required', Rule::unique('invoices', 'code')],
            'Expiration Date' => 'required|date|after:created_at',
            'Receipt Date' => 'nullable|date|after:created_at|before:expiration_at',
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
