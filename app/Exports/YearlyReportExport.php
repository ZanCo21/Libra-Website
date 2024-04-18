<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Peminjaman;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class YearlyReportExport implements WithMultipleSheets
{
    use Exportable;

    protected $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        $sheets = [];

        // Query data from database
        $peminjamans = Peminjaman::with('user')->with('DetailPeminjaman')
            ->select('id','user_id', 'tanggal_peminjaman', 'tanggal_pengembalian', 'tanggal_batas_pengembalian')
            ->whereYear('created_at', $this->year)
            ->get();

        // Transform user_id to user name
        $peminjamans->transform(function ($peminjaman) {
            // If user exists, replace user_id with user name
            if ($peminjaman->user) {
                $peminjaman->user_id = $peminjaman->user->userName;
            }
            return $peminjaman;
        });

        // Map data to change date format
        $peminjamans = $peminjamans->map(function ($peminjaman) {
            $peminjaman->tanggal_peminjaman = Carbon::parse($peminjaman->tanggal_peminjaman)->format('F d, Y');
            $peminjaman->tanggal_pengembalian = Carbon::parse($peminjaman->tanggal_pengembalian)->format('F d, Y');
            $peminjaman->tanggal_batas_pengembalian = Carbon::parse($peminjaman->tanggal_batas_pengembalian)->format('F d, Y');

             // Add DetailPeminjaman data
            $peminjaman->detailPeminjamans = $peminjaman->DetailPeminjaman->map(function ($detail) {
                return [
                    'Buku' => $detail->buku->judul,
                    'Status Peminjaman' => $detail->status_peminjaman,
                ];
            });

            return $peminjaman;
        });

        // Group data by month
        $groupedPeminjamans = $peminjamans->groupBy(function ($peminjaman) {
            return Carbon::parse($peminjaman->tanggal_peminjaman)->format('F');
        });

        // Create a new sheet for each month
        foreach ($groupedPeminjamans as $month => $peminjamans) {
            $sheets[] = new YearlyReportSheet($month, $peminjamans);
        }

        return $sheets;
    }

    public function map($peminjaman): array
    {
        $detailPeminjamans = [];
    
        foreach ($peminjaman->detailPeminjamans as $detailPeminjaman) {
            $book = $detailPeminjaman['Buku'];
            $status = $detailPeminjaman['Status Peminjaman'];
    
            // Menggabungkan buku dan status ke dalam satu string
            $booksString[] = "$book: $status";
        }
    
        // Menggabungkan semua buku menjadi satu string dengan koma sebagai pemisah
        $booksString = implode(', ', $booksString);
    
        return [
            'User Name' => $peminjaman->user_id,
            'Tanggal Peminjaman' => $peminjaman->tanggal_peminjaman,
            'Tanggal Pengembalian' => $peminjaman->tanggal_pengembalian,
            'Tanggal Batas Pengembalian' => $peminjaman->tanggal_batas_pengembalian,
            'Books' => $booksString,
        ];
    }
    
}
