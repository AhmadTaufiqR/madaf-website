<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengurusImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username' => $row['username'],
            'name' => $row['nama'],
            'email' => $row['email'],
            'address' => $row['alamat'],
            'password' => Hash::make($row['password']),
            'level' => 'pengurus',
        ]);
    }
}
