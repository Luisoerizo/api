<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return $students;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status' => 'required'
        ]);

        $students = Student::create($request->all());
        return $students;
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return $student;
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return $student;
    }
}
