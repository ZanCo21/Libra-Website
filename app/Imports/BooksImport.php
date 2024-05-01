<?php

namespace App\Imports;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class BooksImport implements ToModel
{

    // public function model(array $row)
    // {
    //     $judul = $row[0];
    //     $penulis = $row[1]; 
    
    //     // Membaca dan menyimpan gambar dari Excel
    //     $frontImagePath = $row[2];
    //     $backImagePath = $row[3];

    
    //     $penerbit = $row[4];
    //     $tahunTerbit = null;
    //     if ($row[5]) {
    //         $excelDate = (float) $row[5];
    //         $unixTimestamp = ($excelDate - 25569) * 86400;
    //         $tahunTerbit = date('Y-m-d', $unixTimestamp);
    //     }
    //     $deskripsi = $row[6];
    //     $stock = $row[7];
    
    //     // Buat instance buku
    //     $buku = new Buku([
    //         'judul' => $judul,
    //         'penulis' => $penulis,
    //         'penerbit' => $penerbit,
    //         'tahunTerbit' => $tahunTerbit,
    //         'deskripsi' => $deskripsi,
    //         'stock' => $stock,
    //         'front_book_cover' => $frontImagePath,
    //         'back_book_cover' => $backImagePath,
    //     ]);
    
    //     // Simpan buku ke dalam database
    //     $buku->save();
    
    //     // Kembalikan buku
    //     return $buku;
    // }
    

    public function model(array $row)
    {
        $judul = $row[0];
        $penulis = $row[1]; 
    
        // Membaca dan menyimpan gambar dari Excel
        $frontImagePath = $this->storeImageFromExcel($row, ['C1', 'C2', 'C3', 'C4']);
        $backImagePath = $this->storeImageFromExcel($row, ['D1', 'D2', 'D3', 'D4']);

    
        $penerbit = $row[4];
        $tahunTerbit = null;
        if ($row[5]) {
            $excelDate = (float) $row[5];
            $unixTimestamp = ($excelDate - 25569) * 86400;
            $tahunTerbit = date('Y-m-d', $unixTimestamp);
        }
        $deskripsi = $row[6];
        $stock = $row[7];
    
        // Buat instance buku
        $buku = new Buku([
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahunTerbit' => $tahunTerbit,
            'deskripsi' => $deskripsi,
            'stock' => $stock,
        ]);
    
        // Simpan jalur gambar jika ditemukan
        if ($frontImagePath) {
            $buku->front_book_cover = $frontImagePath[0];
        }
    
        if ($backImagePath) {
            $buku->back_book_cover = $backImagePath[0];
        }
    
        // Simpan buku ke dalam database
        $buku->save();
    
        // Kembalikan buku
        return $buku;
    }
    
    
    
    private function storeImageFromExcel($rowData, $imageCells)
    {
        $imagePaths = [];
    
        // Mendapatkan file Excel dari request
        $file = request()->file('file');
        $spreadsheet = IOFactory::load($file);
    
        foreach ($imageCells as $imageCell) {
            // Mendapatkan gambar dari sel yang ditentukan dalam file Excel
            $drawingCollection = $spreadsheet->getActiveSheet()->getDrawingCollection();
            $drawing = null;
    
            foreach ($drawingCollection as $item) {
                if ($item instanceof \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing && $item->getCoordinates() === $imageCell) {
                    $drawing = $item;
                    break;
                }
            }
    
            if ($drawing !== null) {
                if ($drawing instanceof MemoryDrawing) {
                    ob_start();
                    call_user_func(
                        $drawing->getRenderingFunction(),
                        $drawing->getImageResource()
                    );
                    $imageContents = ob_get_contents();
                    ob_end_clean();
                    switch ($drawing->getMimeType()) {
                        case MemoryDrawing::MIMETYPE_PNG :
                            $extension = 'png';
                            break;
                        case MemoryDrawing::MIMETYPE_GIF:
                            $extension = 'gif';
                            break;
                        case MemoryDrawing::MIMETYPE_JPEG :
                            $extension = 'jpg';
                            break;
                    }
                } else {
                    $zipReader = fopen($drawing->getPath(), 'r');
                    $imageContents = '';
                    while (!feof($zipReader)) {
                        $imageContents .= fread($zipReader, 1024);
                    }
                    fclose($zipReader);
                    $extension = $drawing->getExtension();
                }
                
                // Jika ada gambar yang ditemukan, simpan dan kembalikan path-nya
                if ($imageContents) {
                    $myFileName = Str::uuid()->toString() . '.' . $extension;
                    Storage::put('public/photos/book/' . $myFileName, $imageContents);
                    $imagePaths[] = 'photos/book/' . $myFileName;
                }
            }
        }
    
        // Kembalikan array path gambar
        return $imagePaths;
    }    
    
}
