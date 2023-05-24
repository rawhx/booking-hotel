<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Guest;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IncomeController extends Controller
{
    public function excelrooms()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);
        $sheet = $spreadsheet->getActiveSheet();

        $styleArray = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
        ];

        $sheet->mergeCells('A1:C2');
        $sheet->setCellValue('A1', 'INCOME ROOMS');
        $sheet->getStyle('A1')->applyFromArray($styleArray);

        foreach (range('A', 'C') as $columnID) {
            $sheet->getColumnDimension($columnID)
                ->setAutoSize(true);
        };
        
        // Set Table Header
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'eaeaea',
                ],
                'endColor' => [
                    'argb' => 'eaeaea',
                ],
            ],
        ];

        $sheet->getStyle('A3:C3')->applyFromArray($styleArray);
        $stylebody = $sheet->setCellValue('A3', 'No');
        $stylebody = $sheet->setCellValue('B3', 'Date');
        $stylebody = $sheet->setCellValue('C3', 'Income');

        
        $guest = Guest::whereNot('deleted_at')->orderBy('deleted_at','asc')->get();
        $total = 0;
        $no = 1;
        $data = [];

        // Set Borders
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];

        foreach ($guest as $item) {
            $tanggal = date('d-M-Y', strtotime($item['deleted_at']));
            $harga = $item['payment']; 
            
            if (!isset($data[$tanggal])) {
                $data[$tanggal] = $harga;
            } else {
                $data[$tanggal] += $harga;
            }

            $total += $harga;
        }

        $row = 4;
        foreach($data as $tanggal => $totalHarga) {
            $sheet->setCellValue('A'.$row, $no++);
            $sheet->setCellValue('B'.$row, date('d-M-Y', strtotime($tanggal)));
            $sheet->setCellValue('C'.$row, 'Rp '.number_format($totalHarga));
            $row++;
        }
        $sheet->getStyle('A4:C'.$row)->applyFromArray($styleArray);

        $sheet->mergeCells('A'.$row.':B'.$row);
        $sheet->setCellValue('A'.$row, 'Total');
        $sheet->getStyle('A'.$row)
                ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C'.$row, 'Rp '.$total);

        $path = public_path('income-rooms.xlsx');
        $writer->save($path);
        return response()->download($path)->deleteFileAfterSend(true);
    }
}
