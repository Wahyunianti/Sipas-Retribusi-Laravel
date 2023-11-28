<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

interface ExcelExportInterface
{
    public function setExcelHeader(Spreadsheet $spreadsheet): Worksheet;
    public function setExcelContent(Collection $model, Worksheet $spreadsheet): Worksheet;
}
