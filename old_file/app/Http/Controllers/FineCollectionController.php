<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FineCollection;
use App\AccountSetting;
use App\School;
use App\Student;
use App\AttenStudent;
use App\GroupClass;
use App\Holiday;
use App\FineSetup;
use App\Fund;
use Auth;

class FineCollectionController extends Controller
{
    public function fine_collection_add(){
      $classes = $this->getClasses();
      $groups = $this->groupClasses();
      $units = $this->getUnits();
      $funds = Fund::orderBy('id', 'asc')->get();
      return view('backEnd.accounts.fine_collection.add', compact('funds', 'classes', 'groups', 'units'));
    }

    public function fine_student_search(Request $request){
      $classes = $this->getClasses();
      $groups = $this->groupClasses();
      $units = $this->getUnits();
      $funds = Fund::where('status', 1)->get();
      $student = Student::where('master_class_id', $request->master_class_id)
                        ->where('group', $request->group_class_id)
                        ->where('shift', $request->shift)
                        ->where('section', $request->section)
                        ->where('roll', $request->roll)
                        ->first();
      $student_group_id = GroupClass::where('name', $student->group)->first()->id;
      // Fine Generate
      $last_fine_collection = FineCollection::orderBy('id', 'desc')->where('school_id', Auth::getSchool())->where('student_id', $student->id)->first();
      $total_attend = AttenStudent::where('school_id', Auth::getSchool())->where('student_id', $student->student_id)->whereMonth('date', date('m', strtotime('-1 months')))->whereYear('date', date('Y'))->count();
      $total_holiday = Holiday::where('school_id', Auth::getSchool())->whereMonth('date', date('m', strtotime('-1 months')))->whereYear('date', date('Y'))->count();
      $all_dates=array();
      $month = date('m', strtotime('-1 months'));
      $year = date('Y');
      for($d=1; $d<=31; $d++)
      {
          $time=mktime(12, 0, 0, $month, $d, $year);
          if (date('m', $time)==$month)
              $all_dates[]=date('Y-m-d-D', $time);
              if (date('D', $time)=="Fri") {
                $fridays[]=date('Y-m-d-D', $time);
              }
      }
      $fine = FineSetup::where('school_id', Auth::getSchool())
                        ->where('master_class_id', $student->master_class_id)
                        ->where('group_class_id', $student_group_id)
                        ->where('shift', $request->shift)
                        ->first()->amount;
      $absense = count($all_dates)-($total_attend+$total_holiday);
      // return $absense;
      if (empty($fine)) {
        return redirect()->back()->with('error_msg', 'জরিমানা কালেকশনের পূর্বে জরিমানার পরিমান নির্ধারণ করুন ।');
      }
      return view('backEnd.accounts.fine_collection.add', compact('student', 'absense', 'fine', 'last_fine_collection', 'funds', 'classes', 'groups', 'units'));
    }

    public function fine_collection_store(Request $request, SmsSendController $shorter){
      $this->validate($request, [
        "payment_by" => "required|string|max:191",
        "amount" => "required",
        "paid" => "required",
        "payment_date" => "required",
      ]);
      $last_fine_collection = FineCollection::orderBy('id', 'desc')->first();
      if ($last_fine_collection) {
        $serial = $last_fine_collection->serial+1;
      }else {
        $serial = date('Y')."10000";
      }

      $fine_collection = new FineCollection;
      $data = $request->except(['payment_date']);
      $data['school_id'] = Auth::getSchool();
      $data['serial'] = $serial;
      $data['due'] = $request->amount-($request->paid+$request->waiver);
      $data['payment_date'] = date('Y-m-d', strtotime($request->payment_date));
      // return $data;
      $fine_collection->create($data);

      $account_setting = AccountSetting::where('school_id', Auth::getSchool())->first();
      $school=$this->school();
      $school_name = ($school->short_name==NULL) ? $shorter->school_name_process($school->user->name) : $school->short_name;
      if ($account_setting->fine_collection_sms=="1") {
        if (!empty($request->mobile)) {
          $mobile_number = "88".$request->mobile;
          $message = urlencode($request->payment_by.", মেমো নাম্বার-".$serial.", জমা-".$request->paid." /-, ".date('d M Y h:i a ').$school_name);
          $send_sms = $this->sms_send_by_api($school,$mobile_number,$message);
        }
      }
      $fine_collection_view = FineCollection::where('serial', $serial)->first();
      $student = Student::find($request->student_id);
      $funds = Fund::orderBy('id', 'asc')->get();
      $msg = 'আয় সফলভাবে যোগ করা হয়েছে ।';
      $classes = $this->getClasses();
      $groups = $this->groupClasses();
      $units = $this->getUnits();
      $funds = Fund::orderBy('id', 'asc')->get();
      return view('backEnd.accounts.fine_collection.add', compact('funds', 'fine_collection_view', 'msg', 'school', 'account_setting', 'student', 'funds', 'classes', 'groups', 'units'));
    }

    public function fine_collection_manage(){
      $fine_collections = FineCollection::orderBy('id', 'DESC')->where('school_id', Auth::getSchool())->get();
      return view('backEnd.accounts.fine_collection.manage', compact('fine_collections'));
    }


    public function fine_collection_view($id){
      $school = School::find(Auth::getSchool());
      $fine_collection = FineCollection::find($id);
      $student = Student::find($fine_collection->student->id);
      $account_setting = AccountSetting::where('school_id', Auth::getSchool())->first();
      return view('backEnd.accounts.fine_collection.view', compact('student', 'school', 'fine_collection', 'account_setting'));
    }

    public function fine_collection_delete(Request $request){
      $fine_collection = FineCollection::find($request->id);
      $fine_collection->delete();
      return redirect()->back()->with('success_msg', 'আয় সফলভাবে মুছে ফেলা হয়েছে ।');
    }


}
