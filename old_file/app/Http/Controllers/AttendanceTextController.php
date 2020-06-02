<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AttendanceText;
use App\School;

class AttendanceTextController extends Controller
{
    public function add(){
		$attend = AttendanceText::where('type',1)->select('school_id')->get();
		$absent = AttendanceText::where('type',2)->select('school_id')->get();
		$attend_schools = School::whereNotIn('id', $attend)->get();
		$absent_schools = School::whereNotIn('id', $absent)->get();
		return view('backEnd.attendance_text.add',compact('attend_schools', 'absent_schools'));
	}

    public function store(Request $request){
		$this->validate($request,[
			"school_id" => "required",
			"content" => "required",
		]);
		$data = $request->all();
		AttendanceText::create($data);
		return redirect()->route('attendanceText.list')->with('sccmgs', 'উপস্থিতি বার্তা সফলভাবে যোগ করা হয়েছে ।');
	}

    public function list(Request $request){
		$attends = AttendanceText::where('type',1)->get();
		$absents = AttendanceText::where('type',2)->get();
		return view('backEnd.attendance_text.list',compact('attends', 'absents'));
	}

    public function edit($id){
		$attendance = AttendanceText::find($id);
		return view('backEnd.attendance_text.edit',compact('attendance'));
	}

	public function update(Request $request,$id){
		$this->validate($request,[
			"school_id" => "required",
			"content" => "required",
		]);
		$data = $request->all();
		AttendanceText::find($id)->update($data);
		return redirect()->route('attendanceText.list')->with('sccmgs', 'উপস্থিতি বার্তা সফলভাবে আপডেট করা হয়েছে ।');
	}

	public function delete($id){
		$attendance = AttendanceText::find($id)->forceDelete();
		return redirect()->route('attendanceText.list')->with('sccmgs', 'উপস্থিতি বার্তা সফলভাবে মুছে ফেলা হয়েছে ।');
	}

}
