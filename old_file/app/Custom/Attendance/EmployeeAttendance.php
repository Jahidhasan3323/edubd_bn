<?php
 namespace App\Custom\Attendance;
 
 use App\Http\Controllers\Controller;
 use Carbon\Carbon;
 use App\AttenEmployee;
 use App\Staff;
 use Session;
 use Auth;

 class EmployeeAttendance extends Controller
 {
	public function entry($data)
	{  
       $r_data=$this->data_process($data);
       $attendance = AttenEmployee::where($r_data)->first();
       if($attendance){
          $attendance->update(['out_time'=>Carbon::now()->format('h:i:s A')]);
          $message='out';
       }else{
          $r_data['status']='P';
          $r_data['in_time']=Carbon::now()->format('h:i:s A');
          AttenEmployee::create($r_data);
          $message='in';        
       }
       $staff = Staff::where(['staff_id'=>$data['id_card_no'],'school_id'=>Auth::getSchool()])->first();
       session()->flash('photo_path',$staff->photo);
       return $this->returnWithSuccess("Employee, Attendance ".$message." success !!");
	}

	protected function data_process($data){
       	$r_data['school_id']=Auth::getSchool();
       	$r_data['staff_id']=$data['id_card_no'];
       	$r_data['date']=Carbon::now()->format('Y-m-d');
       	return $r_data;
   }
 }