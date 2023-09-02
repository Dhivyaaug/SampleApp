<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
       return view('students.add');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $student = new Student;
        // dd($student);

        $request->validate([
            'profile_pic' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
      ]);

      $profile_pic = $request->file('profile_pic');

      if($profile_pic)
      {
        $filename = time().'_'.$profile_pic->getClientOriginalName();

        $location = public_path('uploads/students');

        $profile_pic->move($location,$filename);

       }


        $student->register_no    = $request->register_no;
        $student->admission_no   = $request->admission_no;
        $student->first_name     = $request->first_name;
        $student->last_name      = $request->last_name;
        $student->email          = $request->email;
        $student->mobile_no      = $request->mobile_no;
        $student->class          = $request->class;
        $student->department     = $request->department;
        $student->degree         = $request->degree;
        $student->batch          = $request->batch;
        $student->profile_pic    = $filename;
        $student->gender         = $request->gender;
        $student->date_of_birth  = $request->date_of_birth;


        if($student->save())
        {
            $students = Student::paginate(10);
            session()->flash('success', 'Student Added Sucessfully!!!');
            return redirect()->route('student.list')->with('students',$students);
        }
        else{
            session()->flash('error', 'Registration was successful.');
            return redirect()->route('student.create');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function list()
    {
        $students = Student::paginate(10);
        return view('students.list')->with('students',$students);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $student = Student::find($id)->toArray();
    // dd($student->toArray());
    return view('students.edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $updatedData = [
        "register_no" => $request->register_no,
        "admission_no" => $request->admission_no,
        "first_name" => $request->first_name,
        "last_name" =>$request->last_name,
        "email" => $request->email,
        "mobile_no" => $request->mobile_no,
        "class" => $request->class,
        "department" => $request->department,
        "degree" => $request->degree,
        "batch" => $request->batch,
        "gender" => $request->gender,
        "date_of_birth" => $request->date_of_birth
    ];

// Use the update method to update the student's data
  $update_status = Student::where('id', $id)->update($updatedData);
  $student = Student::find($id)->toArray();
  if($update_status)
  {

    session()->flash('success', 'Student updated Sucessfully!!!');
    return redirect()->back()->with('student',$student);
  }
  else
  {
    session()->flash('error', 'Something went wrong');
    return redirect()->back()->with('student',$student);
  }

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_status = Student::where('id', $id)->delete();
        session()->flash('error', 'Student Deleted Successfully');
        return $delete_status;
    }
}


