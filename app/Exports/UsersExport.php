<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection,WithHeadings,WithMapping
{


    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    public function map($row): array
    {
        // TODO: Implement map() method.
        if (isset($row->ostan()->first()?->name)){
        return [
            $row->id,
            $row->name,
            $row->phone_number,
            $row->ostan()->first()?->name,
            $row->shahrestan()->first()?->name,
            jdate($row->created_at)->format('Y/m/d')
        ];
        }
        else{
            return [];
        }
    }


    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'شناسه',
            'نام و نام خانوادگی',
            'موبایل',
            'استان',
            'شهرستان',
            'تاریخ عضویت',
        ];
    }
}
