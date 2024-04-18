<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class YearlyReportSheet implements FromCollection, WithTitle, WithColumnWidths, WithHeadings, WithCustomStartCell, WithStyles
{
    protected $month;
    protected $peminjamans;

    public function __construct($month, $peminjamans)
    {
        $this->month = $month;
        $this->peminjamans = $peminjamans;
    }

    public function collection()
    {
        $formattedPeminjamans = collect([]);
    
        foreach ($this->peminjamans as $peminjaman) {
            $booksString = '';
    
            foreach ($peminjaman->detailPeminjamans as $detailPeminjaman) {
                $book = $detailPeminjaman['Buku'];
                $status = $detailPeminjaman['Status Peminjaman'];
    
                // Menggabungkan buku dan status ke dalam satu string
                $booksString .= "$book: $status, ";
            }
    
            // Menghapus koma dan spasi ekstra di akhir string
            $booksString = rtrim($booksString, ', ');
    
            // Tambahkan data yang diformat ke dalam koleksi baru
            $formattedPeminjamans->push([
                'Id' => $peminjaman->id,
                'User Name' => $peminjaman->user_id,
                'Tanggal Peminjaman' => $peminjaman->tanggal_peminjaman,
                'Tanggal Pengembalian' => $peminjaman->tanggal_pengembalian,
                'Tanggal Batas Pengembalian' => $peminjaman->tanggal_batas_pengembalian,
                'Books' => $booksString,
            ]);
        }
    
        return $formattedPeminjamans;
    }
    

    public function title(): string
    {
        return $this->month;
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function headings(): array
    {
        $monthNumber = date('n', strtotime($this->month)); // Mengonversi nama bulan menjadi nomor bulan

        $monthName = date('F', mktime(0, 0, 0, $monthNumber, 1));

        return [
            ["Data Peminjaman $monthName"],
            [],
            [
                'Id',
                'User Name',
                'Tanggal Peminjaman',
                'Tanggal Pengembalian',
                'Tanggal Batas Pengembalian',
                'Books',
            ]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 5,
            'C' => 18,
            'F' => 22,
            'G' => 38,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

        for ($col = 'C'; $col <= $lastColumn; $col++) {
            $sheet->getStyle($col)->getAlignment()->setVertical('center');
            $sheet->getStyle($col)->getAlignment()->setIndent(1);
        }

        $sheet->getStyle('C5:C'. $lastRow)->getAlignment()->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]); 
        
        $lastDate = null;
        $mergeStartRow = 0;
    
        for ($row = 5; $row <= $lastRow; $row++) {
            $currentDate = $sheet->getCell('C' . $row)->getValue();
    
            // Check if the current date is the same as the previous one
            if ($currentDate === $lastDate) {
                // If it's consecutive, update the merge end row
                $mergeEndRow = $row;
            } else {
                // If not consecutive, check if there was a previous merge
                if (isset($mergeStartRow) && isset($mergeEndRow) && $mergeEndRow > $mergeStartRow) {
         
                    // Merge cells for the current date
                    $sheet->mergeCells("C{$mergeStartRow}:C{$mergeEndRow}");
                }
    
                // Update the start of the next potential merge
                $mergeStartRow = $row;
            }
    
            // Update the last date for the next iteration
            $lastDate = $currentDate;
        }
    
        // Merge cells for the last set of consecutive dates (if any)
        if (isset($mergeStartRow) && isset($mergeEndRow) && $mergeEndRow > $mergeStartRow) {
      
            $sheet->mergeCells("C{$mergeStartRow}:C{$mergeEndRow}");
        }

        $sheet->getStyle('B' . ($lastRow + 1) . ':' . $lastColumn . ($lastRow + 1))->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'C2D9FF'],
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'horizontal' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->mergeCells('B2:' . $lastColumn . '2');
        $sheet->getStyle('B2:' . $lastColumn . '2')->applyFromArray([
            'font' => ['name' => 'Calibri', 'size' => 13, 'bold' => true],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'C2D9FF'],
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'horizontal' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->mergeCells('B3:' . $lastColumn . '3');
        $sheet->getStyle('B3:' . $lastColumn . '3')->applyFromArray([
            'font' => ['name' => 'Calibri', 'size' => 13, 'bold' => true],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'C2D9FF'],
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'horizontal' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('B4:' . $lastColumn . '4')->applyFromArray([
            'font' => ['name' => 'Calibri', 'size' => 12, 'bold' => true],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'C2D9FF'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle($lastColumn . '5:' . $lastColumn . $lastRow)->applyFromArray([
            'borders' => [
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('C5:C' . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'borders' => [
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('D5:D'  . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('E5:E' . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getStyle('F5:F' . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
        

        $sheet->getStyle('G5:G' . $lastRow)->applyFromArray([
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        $sheet->getColumnDimension('D')->setAutoSize(true);

        $sheet->getColumnDimension('E')->setAutoSize(true);

        return [
            2 => [
                'font' => ['size' => 13, 'bold' => true],
            ],
            3 => [
                'font' => ['size' => 12, 'bold' => true],
            ],
            'B3:B' . $lastRow => [
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
            'B5:B' . $lastRow => [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        'color' => ['rgb' => '000000'],
                    ],
                    'right' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        'color' => ['rgb' => '000000'],
                    ],
                    'left' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ],
            'F' => [
                'alignment' => ['wrapText' => true],
            ],
            'G' => [
                'alignment' => ['wrapText' => true],
            ],
        ];
    }    
}
