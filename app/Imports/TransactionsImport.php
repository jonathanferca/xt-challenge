<?php

namespace App\Imports;

use App\XTChallenge\Models\MySQL\Transaction;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class TransactionsImport implements SkipsOnFailure, ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Transaction([
            'account_number' => $row['account_number'],
            'type' => $row['type'],
            'original_transaction_id' => $row['original_transaction_id'],
            'sent_at' => $row['sent_at']
        ]);
    }

    public function rules(): array
    {
        return [
            'account_number' => 'required',
            'type' => 'required',
            'original_transaction_id' => 'required',
            'original_transaction_id' => Rule::unique('transactions', 'original_transaction_id'),
            'sent_at' => 'required'
        ];
    }

    public function onFailure(Failure ...$failures) {
        return;
    }
}
