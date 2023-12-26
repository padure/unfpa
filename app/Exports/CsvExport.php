<?php

namespace App\Exports;

use App\Models\Logs;
use App\Result;
use Maatwebsite\Excel\Concerns\FromCollection;


class CsvExport implements FromCollection
{
    /**
     * @var false|mixed
     */
    private $school;

    /**
     * CsvExport constructor.
     * @param false $school
     */
    public function __construct($school = false)
    {
        $this->school = $school;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->school) {
            return Result::query()->where('school_id', $this->school)->get();
        } else {
            return Result::all();
        }
    }
}
