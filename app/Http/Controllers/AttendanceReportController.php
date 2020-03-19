<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttenStudent;
use App\AttenEmployee;
use App\GroupClass;
use DB;
use Auth;

class AttendanceReportController extends Controller
{
    public $months = Array ('January','February','March','April','May','June','July','August','September','October','November','December');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $months = $this->months;
        $groups = $this->groupClasses();
        $classes = $this->getClasses();
        $units = $this->getUnits();
        $days = array();
        if($request->all()){
            $this->validate($request,[
                'year'=>'required',
                'month'=>'required',
            ]);
            $query=$request->except('user_type','_token','month','year','group_class_id');
            $query['school_id']=Auth::getSchool();
            $query['group']=GroupClass::where('id',$request->group_class_id)->value('name');
            $atten_students=AttenStudent::with('student.user')->where($query)
                           ->whereMonth('date',$request->month)
                           ->whereYear('date',$request->year)
                           ->groupBy('student_id')
                           ->get();
            dd($atten_students[0]->student->user);
            $num_of_days = date('t',mktime (0,0,0,$request->month,1,$request->year));
        }
        $months = json_encode($months);
        $years1 = AttenStudent::groupBy(DB::raw('YEAR(date)'))
                 ->select(DB::raw('YEAR(date) year'))->pluck('year');
        $years2 = AttenEmployee::groupBy(DB::raw('YEAR(date)'))
                 ->select(DB::raw('YEAR(date) year'))->pluck('year');
        $years = array_unique(array_merge($years1->toArray(),$years2->toArray()));
        $search = $request->except('_token');
        return view('backEnd.attendence.report.index',compact('years','months','search','groups','classes','units'));
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
     * @return \Illuminate\Http\Responsew
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
