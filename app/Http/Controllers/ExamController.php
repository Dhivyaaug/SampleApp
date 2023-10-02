<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Exams;
use App\Models\Blocks;
use Illuminate\Http\Request;
use DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::all()->toArray();
        return view('exam.register')->with('departments',$departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exam = new Exams;
        $block = new Blocks;

        if($request->form == 'block')
        {
            $block->block_name     = $request->block_name;
            $block->block_capacity = $request->seat_capacity;
            $block->hall_no        = $request->hall_no;

            if($block->save())
            {
                $halls =  Blocks::paginate(10);
                return redirect()->route('examhall.list')->with('halls',$halls);
            }
            else
            {
                dd('Something went wrong!!');
            }

        }
        else
        {
            $exam->department_id =  $request->department;
            $exam->exam_code     =  $request->exam_code;
            $exam->exam_name     =  $request->exam_name;
            $exam->exam_date     =  $request->date;
            $exam->start_time    =  $request->start_time;
            $exam->end_time      =  $request->end_time;
            $exam->session       =  $request->session;
            $exam->batch         =  $request->batch;
            $exam->year          =  $request->year;
            $exam->updated_at    =  null;

            if($exam->save())
            {
                // $exams_result = DB::select('*')->join('exams','exams.department_id','=','departments.department_id')->get()->paginate(10);
                // $exams = Exams::paginate(10);
                $exams_result = DB::table('departments')->select('*')->join('exams','exams.department_id','=','departments.department_id')->paginate(10);
                session()->flash('success', 'Exams Saved successfully!!!');
                return redirect()->route('exam.list')->with('exams',$exams_result);
            }
            else
            {
                dd('Something went wrong!!');
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
        $hall =  Blocks::find($id);
        return view('examhall.edit')->with('hall',$hall);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $block = new Blocks();
        $update_arr = [
            'block_name'     => $request->block_name,
            'hall_no'        => $request->hall_no,
            'block_capacity' => $request->seat_capacity
        ];

        $update =$block->where('block_id',$id)->update($update_arr);

        if($update)
        {
            $halls = Blocks::paginate(10);
            session()->flash('success', 'Examshall Updated successfully!!!');
            return redirect()->route('examhall.list')->with('halls',$halls);
        }
    }

    public function list()
    {

        $exams_result = DB::table('departments')->select('*')->join('exams','exams.department_id','=','departments.department_id')->paginate(10);
        return view('exam.list')->with('exams',$exams_result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function indexhall()
    {
        return view('examhall.register');
    }

    public function hallList()
    {
    $halls =  Blocks::paginate(10);
    return view('examhall.list')->with('halls',$halls);
    }

    public function editexam(string $id)
    {
        // dd($id);
        $exam =  DB::table('departments')->select('*')->join('exams','exams.department_id','=','departments.department_id')->where('exams.exam_id',$id)->first();
        // dd($exam);
        return view('exam.edit')->with('exam',$exam);
    }


}
