<?php

namespace App\Exports;

use App\Models\Enquiry;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class SendEmailListOfInquiries implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'Email',
        ];
    }

    public function query()
    {
        return Enquiry::query()->whereDate('created_at', Carbon::today());
    }

    public function map($inquery): array
    {
        return [
            $inquery->email,
        ];
    }
}
