<?php
namespace Modules\Contact\Models;

use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Contact\Models\Contact;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportContact implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function collection()
    {
        return Contact::select('name','email','phone','message','apply_position')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone number',
            'Notes',
            'Apply position',
        ];
    }

        /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10);
                $event->sheet->getColumnDimension('E1')->setWidth(32);
            },
        ];
    }
}