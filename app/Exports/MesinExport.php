<?php

namespace App\Exports;

use App\Models\Mesin; 
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class MesinExport implements 
    FromCollection, 
    WithHeadings, 
    WithMapping, 
    ShouldAutoSize, 
    WithEvents
{
    /**
    
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        return Mesin::select(
            'kode', 
            'nama_mesin', 
            'no_motor', 
            'type_motor', 
            'kw_motor', 
            'rpm_motor', 
            'bearing_depan', 
            'bearing_belakang', 
            'seal_depan', 
            'seal_belakang', 
            'catatan'
        )->get();
    }
    
    /**
    
     * @param mixed $mesin
     * @return array
     */
    public function map($mesin): array
    {
        return [
            $mesin->kode,
            $mesin->nama_mesin,
            $mesin->no_motor,
            $mesin->type_motor,
            $mesin->kw_motor,
            $mesin->rpm_motor,
            $mesin->bearing_depan,
            $mesin->bearing_belakang,
            $mesin->seal_depan,
            $mesin->seal_belakang,
            $mesin->catatan,
        ];
    }

    /**
    
     * @return array
     */
    public function headings(): array
    {
        
        return [
            'KODE MESIN',
            'NAMA MESIN',
            'NO. MOTOR',
            'TIPE MOTOR',
            'KW MOTOR',
            'RPM MOTOR',
            'BEARING DEPAN',
            'BEARING BELAKANG',
            'SEAL DEPAN',
            'SEAL BELAKANG',
            'CATATAN',
        ];
    }

    /**
    
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                
                $highestRow = $event->sheet->getHighestRow();
                $highestColumn = $event->sheet->getHighestColumn();
                $fullRange = 'A1:' . $highestColumn . $highestRow;
                $headerRange = 'A1:' . $highestColumn . '1';

            
                $event->sheet->getStyle($fullRange)->getAlignment()->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );
          
                $event->sheet->getStyle($fullRange)->getAlignment()->setVertical(
                    Alignment::VERTICAL_CENTER
                );
                
              
                $event->sheet->getStyle($headerRange)->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                ]);

           
                $event->sheet->getStyle($fullRange)->applyFromArray([
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