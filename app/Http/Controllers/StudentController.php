<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = StudentResource::collection(Student::all());
        return $students;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        return new StudentResource(Student::create($request->all())); //Retornando nuevo registro insertado con el status code
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return new StudentResource($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return new StudentResource($student);
    }
}
