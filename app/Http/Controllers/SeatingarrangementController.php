<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;
use App\Models\Blocks;
use App\Models\Students;
use DB;

class SeatingarrangementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today= date("Y-m-d");
        // dd();
        $today_exams =  Exams::where('exam_date','like',$today)->get()->toArray();
        $exams     = $today_exams ?? $today_exams;
        $available_halls = Blocks::get(['block_id','block_name'])->toArray();
        $response['exams'] = $today_exams;
        $response['halls'] = $available_halls;

        // dd($response);

        return view('seating.generate')->with('response',$response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $exam_id  = $request->exam;
        $block_id = $request->hall;
       
        // dd($exam_id);
        $students_list_for_exam  = DB::table('exams')
                                ->select('students.*')
                                ->join('departments','departments.department_id','=','exams.department_id')
                                ->join('students','students.department','=','departments.department_id')
                                ->where('exams.exam_id',$exam_id)
                                ->get()
                                ->toArray();

        dd($students_list_for_exam);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
