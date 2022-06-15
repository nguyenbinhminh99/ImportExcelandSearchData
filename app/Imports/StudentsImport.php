<?php
namespace App\Imports;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'studentID'   => $row['studentid'],
            'name'        => $row['name'],
            'school'      => $row['school'],
            'sex'         => $row['sex'],
            'phone'       => $row['phone'],
        ]);
    }
}
