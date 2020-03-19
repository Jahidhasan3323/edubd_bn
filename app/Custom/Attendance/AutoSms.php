<?php
 namespace App\Custom\Attendance;

 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Http\Controllers\SmsSendController;
 use App\School;
 use App\Student;
 use App\AttenStudent;
 use Auth;


 class AutoSms extends Controller
 {
 	public static function attend_students()
 	{
        $schools = School::where('sms_service',1)->get();
        foreach ($schools as $school) {
            $school_name=self::school_name_process($school->user->name);
            $message =urlencode("আপনার সন্তান উপস্থিত আছে ".$school_name);
            $numbers = [];
            $students = AttenStudent::whereDate('date',date('Y-m-d'))->get();
            foreach ($students as $student) {
                $numbers[] = self::get_st_numbers($student->student_id);
            }
            $mobile_number = implode(',', $numbers);
            // $mobile_number = "8801729890904";
            $url_AllNumber = "http://sms.worldehsan.org/api/send_sms?api_key=".$school->api_key."&sender_id=".$school->sender_id."&number=".$mobile_number."&message=".$message;
            // $send = file_get_contents($url_AllNumber);
            // return strlen("আপনার সন্তান উপস্থিত আছে ".$school_name.'@Ehsan Software');
        }
 	}

 	public static function absent_students()
 	{
        $schools = School::where('sms_service',1)->get();
        foreach ($schools as $school) {
            $school_name=self::school_name_process($school->user->name);
            $message =urlencode("আপনার সন্তান অনুপস্থিত ".$school_name);
            $numbers = [];
            $students = AttenStudent::whereDate('date',date('Y-m-d'))->get();
            foreach ($students as $student) {
                $numbers[] = self::get_st_numbers($student->student_id);
            }
            $mobile_number = implode(',', $numbers);
            // $mobile_number = "8801729890904";
            $url_AllNumber = "http://sms.worldehsan.org/api/send_sms?api_key=".$school->api_key."&sender_id=".$school->sender_id."&number=".$mobile_number."&message=".$message;
            // $send = file_get_contents($url_AllNumber);
            return strlen("আপনার সন্তান অনুপস্থিত ".$school_name.'@Ehsan Software');
        }
 	}

    public static function get_st_numbers($student_id){
        $student = Student::where('student_id', $student_id)->first();
        if ($student) {
            if ($student->f_mobile_no) {
                return $student->f_mobile_no;
            }elseif ($student->m_mobile_no) {
                return $student->m_mobile_no;
            }else {
                return $student->guardian_mobile;
            }
        }
    }

    public static function school_name_process($name){
        $school_words=explode(' ',$name);
        foreach ($school_words as $key => $school_word) {
             $school_name_arr[$key]=substr($school_word, 0,6).':';
        }
        return implode(' ', $school_name_arr);
    }


 }


 // 'আপনার সন্তান অনুপস্থিত'
 // 'আপনার সন্তান উপস্থিত আছে'
