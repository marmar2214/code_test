<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
 use App\Http\Requests\StudentUpdateRequest;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::where('user_id', auth()->id())->get();
        return view('students.index', compact('students'));
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
    public function store(StudentRequest $request)
    {
        $student = new Student($request->validated());
        $student->user_id = auth()->id();
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        
        // $this->authorize('view', $student);
        // return view('student.show', compact('student'));

        if (Gate::allows('view', $student)) {
            return view('students.show', compact('student'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        // $this->authorize('update', $student);
        // return view('students.edit', compact('student'));

        if (Gate::allows('update', $student)) {
            return view('students.edit', compact('student'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(StudentRequest $request, Student $id)
    // {
    //     // $student = Student::findOrFail($id);
    //     // $this->authorize('update', $student);
    //     // $student->update($request->validated());

    //     // return redirect()->route('students.index')->with('success', 'Student updated Successfully.');
    //     // if (Gate::allows('update', $student)) {
    //     //     $student->update($request->validated());
    //     //     return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    //     // } else {
    //     //     abort(403, 'Unauthorized action.');
    //     // }
    // }

    public function update(StudentUpdateRequest $request, string $id)
    {
        // dd($request);
        // echo $id;
        $student=Student::find($id);
        $student->update($request->all());
        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
       
        $this->authorize('delete', $student);
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully.');
    }
}
