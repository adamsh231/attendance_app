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
}
