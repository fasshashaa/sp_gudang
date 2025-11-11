<?php

namespace App\Exports;

use App\Models\Mesin; 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison; 

class MesinExport implements 
    FromCollection, 
    WithHeadings, 
    WithMapping, 
    WithEvents,
    WithStrictNullComparison 
{

    
    public function collection()
    {
        return Mesin::select(
            'kode', 'nama_mesin', 'no_motor', 'type_motor', 'kw_motor', 'rpm_motor', 
            'bearing_depan', 'bearing_belakang', 'seal_depan', 'seal_belakang', 'catatan'
        )->get();
    }
    
    public function map($mesin): array
    {
        return [
            $mesin->kode, $mesin->nama_mesin, $mesin->no_motor, $mesin->type_motor, 
            $mesin->kw_motor, $mesin->rpm_motor, $mesin->bearing_depan, $mesin->bearing_belakang, 
            $mesin->seal_depan, $mesin->seal_belakang, $mesin->catatan,
        ];
    }

    public function headings(): array
    {
        return [
            'KODE MESIN', 'NAMA MESIN', 'NO. MOTOR', 'TIPE MOTOR', 'KW MOTOR', 'RPM MOTOR', 
            'BEARING DEPAN', 'BEARING BELAKANG', 'SEAL DEPAN', 'SEAL BELAKANG', 'CATATAN',
        ];
    }


    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $fullRange = 'A1:' . $highestColumn . $highestRow;
                $headerRange = 'A1:' . $highestColumn . '1';

                $sheet->getColumnDimension('A')->setWidth(15); 
                $sheet->getColumnDimension('B')->setWidth(25); 
                $sheet->getColumnDimension('C')->setWidth(15); 
                $sheet->getColumnDimension('D')->setWidth(20); 
                $sheet->getColumnDimension('E')->setWidth(15); 
                $sheet->getColumnDimension('F')->setWidth(15); 
                $sheet->getColumnDimension('G')->setWidth(20); 
                $sheet->getColumnDimension('H')->setWidth(20); 
                $sheet->getColumnDimension('I')->setWidth(15); 
                $sheet->getColumnDimension('J')->setWidth(15); 
                $sheet->getColumnDimension('K')->setWidth(45);

                
                $catatanRange = 'K2:K' . $highestRow;
                $sheet->getStyle($catatanRange)->getAlignment()->setWrapText(true);
                $sheet->getStyle($catatanRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); 
                $sheet->getStyle($catatanRange)->getAlignment()->setVertical(Alignment::VERTICAL_TOP); 
                
                for ($row = 2; $row <= $highestRow; $row++) {
                    $sheet->getRowDimension($row)->setRowHeight(-1); 
                }

                $dataRangeCenter = 'A1:K' . $highestRow; 
                $sheet->getStyle($dataRangeCenter)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle($dataRangeCenter)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
     
                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);

                $sheet->getStyle($fullRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}