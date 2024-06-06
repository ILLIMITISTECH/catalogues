<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WhithHeadings;


class UserExport implements FromCollection
{
    public function headings():array{
        return[
            'nom',
            'prenom',
            'email',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
        //return collect(User::getUser());
    }
}