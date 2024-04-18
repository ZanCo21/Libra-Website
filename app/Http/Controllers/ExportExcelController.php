<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Exports\YearlyReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    
    protected function getMonthName($month)
    {
        return date('F', mktime(0, 0, 0, $month, 1));
    }

    public function exportYearlyReport($year)
    {
        return Excel::download(new YearlyReportExport($year), 'Yearly_Report_' . $year . '.xlsx');
    }
}
