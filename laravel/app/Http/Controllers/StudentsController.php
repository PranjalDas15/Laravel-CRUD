<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::orderBy('created_at', 'DESC')->get();
        return view('students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $rules = [
            'name' => 'required|min:3',
            'course' => 'required|min:3',
            'age'=> 'required|min:1|max:70',
            'gender'=>'required|in:male,female'
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->route('students.create')->withInput()->withErrors($validator);
        }

        //store student in database

        $student = new Students();
        $student->name = $request->name;
        $student->course = $request->course;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Students::findOrFail(($id));
        return view('students.show', [
            'student'=> $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $student = Students::findOrFail($id);
        return view('students.edit', [
            'student' => $student 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        $rules = [
            'name' => 'required|min:3',
            'course' => 'required|min:3',
            'age'=> 'required|max:3'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->route('students.create')->withInput()->withErrors($validator);
        }

        //update a student in database

        $student->name = $request->name;
        $student->course = $request->course;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.edit',$student->id)->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Students::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
