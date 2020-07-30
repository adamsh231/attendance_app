<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function overview(){
        $student = Student::paginate(10);
        return response()->json($student, 200);
    }

    public function updateStatus(Student $student){
        $student->status = 1;
        $student->save();
        return response()->json("Lulus!");
    }
}
