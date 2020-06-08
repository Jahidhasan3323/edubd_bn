<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MasterClass;
use App\GroupClass;
use App\Unit;
use App\Student;
use App\Staff;
use App\AttenStudent;
use App\AttenEmployee;
use Session;
use Carbon\Carbon;

class MenualAttendenceController extends Controller
{
    public function studentEntry(Request $request)
    {
        $classes = $this->getClasses();
        $group_classes =GroupClass::all();
        $units =$this->getUnits();
        $group_class=GroupClass::where('id',$request->group_class_id)->select('name')->first();
        $students=array();
        if($request->all()){
            $students= Student::where([
                'master_class_id'=>$request->master_class_id,
                'group'=>$group_class->name,
                'section'=>$request->section,
                'shift'=>$request->shift,
                'school_id'=>Auth::getSchool()
            ])->get()->sortBy('roll');
         }
        $search= $request->all();
        return view('backEnd.attendence.student.student_entry',compact('classes','group_classes','units','search','students'));
    }

    public function studentStore(Request $request)
    {
        foreach($request->student_id as $key => $id_no) {
            $entry_check = AttenStudent::where([
                            'school_id'=>Auth::getSchool(),
                            'student_id'=>$id_no,
                            'date'=>Carbon::now()->format('d-m-Y'),
                            'month'=>Carbon::now()->format('m'),
                            'year'=>Carbon::now()->format('Y'),
                            ])->first();
                if(!$entry_check){
                    $data['school_id']=Auth::getSchool();
                    $data['student_id']=$id_no;
                    $data['date']=Carbon::now()->format('d-m-Y');
                    $data['month']=Carbon::now()->format('m');
                    $data['year']=Carbon::now()->format('Y');
                    $data['in_time']=Carbon::now()->format('h:i:s A');
                    AttenStudent::create($data);

                }
                Session::flash('sccmgs', 'শিক্ষার্থী, প্রবেশের সময় সফলভাবে যোগ করা হয়েছে !');
            }

        return redirect()->back();
    }

    public function staffEntry(Request $request)
    {
        $staffs = Staff::with(['user','user.group','designation'])->where('school_id',Auth::getSchool())->get();
        return view('backEnd.attendence.staff.staff_entry',compact('staffs'));
    }

    public function staffStore(Request $request)
    {
      foreach($request->staff_id as $key => $id_no) {
              $entry_check = AttenEmployee::where([
                              'school_id'=>Auth::getSchool(),
                              'staff_id'=>$id_no,
                              'date'=>Carbon::now()->format('d-m-Y'),
                              'month'=>Carbon::now()->format('m'),
                              'year'=>Carbon::now()->format('Y'),
                              ])->first();
              if(!$entry_check){
                 $data['school_id']=Auth::getSchool();
                 $data['staff_id']=$id_no;
                 $data['date']=Carbon::now()->format('d-m-Y');
                 $data['month']=Carbon::now()->format('m');
                 $data['year']=Carbon::now()->format('Y');
                 $data['in_time']=Carbon::now()->format('h:i:s A');
                 AttenEmployee::create($data);
              }
              Session::flash('sccmgs', 'শিক্ষক/কর্মাচারী,  প্রবেশের সময় সফলভাবে যোগ করা হয়েছ !');
          }

        return redirect()->back();
    }
}