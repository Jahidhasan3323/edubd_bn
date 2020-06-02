<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GroupClass;
use App\Student;
use App\ExamType;
use App\School;

class AttendanceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validation($request);
        $group=GroupClass::where('id',$request->group_class_id)->first();
        $data=$request->only('master_class_id','shift','section');
        $data['group']=$group->name;
        $data['school_id']=Auth::getSchool();
        $exam_year=$request->exam_year;
        $students=Student::with('user','masterClass')->where($data)->current()->get();
        $students=$students->sortBy('roll');
        $exam=ExamType::where('id',$request->exam_type_id)->first();
        $school=School::with('user')->where('id',$data['school_id'])->first();
        return view('backEnd.attendanceList.index',compact('students','school','request','exam','data','exam_year'));
    }


    protected function validation($request){
      $this->validate($request,[
         'exam_year'=>'required',
         'master_class_id'=>'required',
         'group_class_id'=>'required',
         'shift'=>'required',
         'section'=>'required'
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = $this->getExams();
        $years = $this->exam_year();
        $classes = $this->getClasses();
        $groups = $this->groupClasses();
        $units = $this->getUnits();
        return view('backEnd.attendanceList.create',compact('classes', 'years', 'exams','groups','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
