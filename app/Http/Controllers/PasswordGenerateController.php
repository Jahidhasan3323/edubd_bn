<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\School;
use App\MasterClass;
use App\Student;
use App\Staff;
use App\Commitee;
use App\User;

class PasswordGenerateController extends Controller
{
    public function student_password(){
		$schools = School::all();
        $class_groups=$this->groupClasses();
        $units=$this->getUnits();
        $sessions = Student::distinct('session')->pluck('session');
		return view('backEnd.password.student_password',compact('schools','class_groups','units','sessions'));
	}
	public function student_password_reset(Request $request){
		// dd($request->all());
		$students = Student::where([
			"school_id" => $request->school_id,
			"master_class_id" => $request->master_class_id,
			"group" => $request->group,
			"shift" => $request->shift,
			"section" => $request->section,
			"session" => $request->session,
		])->get();
		$student = Student::where([
			"school_id" => $request->school_id,
			"master_class_id" => $request->master_class_id,
			"group" => $request->group,
			"shift" => $request->shift,
			"section" => $request->section,
			"session" => $request->session,
		])->first();
		$schools = School::all();
        $class_groups=$this->groupClasses();
        $units=$this->getUnits();
        $sessions = Student::distinct('session')->pluck('session');
		return view('backEnd.password.student_password',compact('schools','class_groups','units','sessions','students','student','request'));
	}

	public function student_password_generate(Request $request){
		$school = School::find($request->school_id);
		$user_id = $this->password_reset($request->id);
		$student = Student::whereIn('user_id',$user_id)->first();
		$students = Student::whereIn('user_id',$user_id)->get();
		return view('backEnd.login_info.print.student_login_info_print',compact('school','students','student'));
	}

    public function employee_password(){
		$schools = School::all();
		return view('backEnd.password.employee_password',compact('schools'));
	}
	public function employee_password_reset(Request $request){
		// dd($request->all());
		$schools = School::all();
        $employees = Staff::where('school_id',$request->school_id)->get();
		return view('backEnd.password.employee_password',compact('schools','employees'));
	}

	public function employee_password_generate(Request $request){
		// dd($request->all());
		$school = School::find($request->school_id);
		$user_id = $this->password_reset($request->id);
		$employees = Staff::whereIn('user_id',$user_id)->get();
		return view('backEnd.password.employee_password',compact('school','employees'));
	}

    public function password_reset($user_id)
    {
        $users = User::whereIn('id',$user_id)->get();
        foreach ($users as $user) {
            $password = rand(10000000,99999999);
            $user->real_password = $password;
            $user->password = bcrypt($password);
            // $user->real_password = null;
            $user->save();
        }
        return $user_id;
    }



}
