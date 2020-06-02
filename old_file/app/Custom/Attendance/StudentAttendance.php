<?php
 namespace App\Custom\Attendance;

 use App\Http\Controllers\Controller;
 use Carbon\Carbon;
 use App\AttenStudent;
 use App\Student;
 use Session;
 use Auth;
 
 class StudentAttendance extends Controller
 {
 		public function entry($data)
 		{  
 		   $student = Student::where(['student_id'=>$data['id_card_no'],'school_id'=>Auth::getSchool()])->first();
           $r_data=$this->data_process($data,$student);
           $attendance = AttenStudent::where($r_data)->first();
           if($attendance){
                $attendance->update(['out_time'=>Carbon::now()->format('h:i:s A')]);
                $message='out';
           }else{
               $r_data['status']='P';
               $r_data['in_time']=Carbon::now()->format('h:i:s A');
               AttenStudent::create($r_data);
               $message='in';
           }
           session()->flash('photo_path',$student->photo);
           return $this->returnWithSuccess("Student, Attendance ".$message." success !!");     
 		}

 		protected function data_process($data,$student){
 	       	$r_data['school_id']=Auth::getSchool();
 	       	$r_data['student_id']=$student->student_id;
 	       	$r_data['master_class_id']=$student->master_class_id;
 	       	$r_data['shift']=$student->shift;
 	       	$r_data['section']=$student->section;
 	       	$r_data['group']=$student->group;
 	       	$r_data['roll']=$student->roll;
 	       	$r_data['session']=$student->session;
 	       	$r_data['regularity']=$student->regularity;
 	       	$r_data['date']=Carbon::now()->format('Y-m-d');
 	       	return $r_data;
 	   }
 }