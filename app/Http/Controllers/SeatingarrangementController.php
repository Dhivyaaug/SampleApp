<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exams;
use App\Models\Blocks;
use App\Models\Students;
use App\Models\Seatings;
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

        $department_id = Exams::where('exam_id',$exam_id)->pluck('department_id')->first();
        // dd($get_department);

        $students_list_for_exam  = DB::table('exams')
                                ->select('students.*','exams.*')
                                ->join('departments','departments.department_id','=','exams.department_id')
                                ->join('students','students.batch','=','exams.batch')
                                ->where('exams.exam_id',$exam_id)
                                ->where('students.department',$department_id)
                                ->orderBy('register_no','asc')
                                ->get()
                                ->toArray();

        $block_capacity = BlockS::where('block_id',$block_id)->pluck('block_capacity')->first();

        $max_capacity  = count($students_list_for_exam) > $block_capacity ? $block_capacity : $students_list_for_exam;

        // dd($students_list_for_exam);
        // $seating_arr = [];
        $seating = new Seatings;
        $seating->record_id      =  $seating->max('record_id') == 0 ? 1 : $seating->max('record_id')+1;
        $seating->exam_id        =  $exam_id;
        $seating->hall_id        =  $block_id;
        $seating->start_reg_no   =  $students_list_for_exam[0]->register_no;
        $seating->end_reg_no     =  $students_list_for_exam[(count($students_list_for_exam)-1)]->register_no;
        $seating->created_at     =  now();
        $seating->deleted_at     =  null;
        $seating->updated_at     =  now(); 
        
        if(\request()->ajax())
        {
            return DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }



        if($seating->save())
        {
            $students = Seatings::paginate(10);
            session()->flash('success', 'Seating Created Sucessfully!!!');
            return back();
        }

        
        // dd($seating);

        // for($index=0;$index < $max_capacity;$index++)
        // {
        //    $seating_arr
        // }
        // dd($students_list_for_exam);

        // if(count($students_list_for_exam)
       
        // while()

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
