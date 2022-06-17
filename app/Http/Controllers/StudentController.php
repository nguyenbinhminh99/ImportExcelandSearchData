<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Models\Student;
class StudentController extends Controller
{
    public function view()
    {
        return view('importexcel');
    }
    public function import(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new StudentsImport, $path);
        return back()->with('success', 'Success!!!');

    }
    public function search(Request $request){
        if($request->ajax()){

            $data=Student::where('studentID','like','%'.$request->search.'%')
                ->orwhere('name','like','%'.$request->search.'%')->get();


            $output='';
            if(count($data)>0){

                $output ='
            <table class="table">
            <thead>
            <tr>
                <th scope="col">studentID</th>
                <th scope="col">name</th>
                <th scope="col">school</th>
                <th scope="col">Sex</th>
                <th scope="col">Phone</th>
            </tr>
            </thead>
            <tbody>';
                foreach($data as $row){
                    $output .='
                    <tr>
                    <th scope="row">'.$row->studentID.'</th>
                    <td>'.$row->name.'</td>
                    <td>'.$row->school.'</td>
                    <td>'.$row->sex.'</td>
                    <td>'.$row->phone.'</td>
                    </tr>
                    ';
                }
                $output .= '
             </tbody>
            </table>';
            }
            else{
                $output .='No results';
            }
            return $output;
        }
    }

}
