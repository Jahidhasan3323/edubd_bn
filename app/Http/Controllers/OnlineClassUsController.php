<?php

namespace App\Http\Controllers;

use App\OnlineClassUs;
use App\MasterClass;
use App\GroupClass;
use App\Unit;
use App\Student;
use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;
use Auth;

class OnlineClassUsController extends Controller
{
    public function index()
    {
        if(Auth::is('teacher')  || Auth::is('admin')){
        }else{
            return redirect('/home');
        }
        $online_class=OnlineClassUs::with('masterClass')->where(['created_by'=>Auth::id(),'school_id'=>Auth::getSchool()])->get();
        //dd($online_class);
        return view('backEnd.online_class_us.index',compact('online_class'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::is('teacher')  || Auth::is('admin')){
        }else{
            return redirect('/home');
        }
        $id=Auth::schoolType();
        $school_type_ids=explode('|', $id);
        $classes = MasterClass::whereIn('school_type_id', $school_type_ids)->get();
        $group_classes=GroupClass::all();
        $units=Unit::where('school_id',Auth::getSchool())->get();
        return view('backEnd.online_class_us.create',compact('classes','group_classes','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->all();
       $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
            'type' => 'required',
        ]);
       if ($request->type==1) {
        
            $this->validate($request, [
                'master_class_id' => 'required',
                'group' => 'required',
                'section' => 'required',
                'shift' => 'required',
            ]);
        }
        if ($request->type==2  ) {
            $data['master_class_id']=0;
            $data['group']=0;
            $data['section']=0;
            $data['shift']=0;
        }
        $data['created_by']=Auth::id();
        $data['school_id']=Auth::getSchool();
        OnlineClassUs::create($data);
        return $this->returnWithSuccessRedirect('আপনার তথ্য সংরক্ষণ হয়েছে !','online_class_us');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OnlineClassUs  $onlineClass
     * @return \Illuminate\Http\Response
     */
    public function show(OnlineClassUs $onlineClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OnlineClassUs  $onlineClass
     * @return \Illuminate\Http\Response
     */
    public function edit($oc_id)
    {
        if(Auth::is('teacher')  || Auth::is('admin')){
        }else{
            return redirect('/home');
        }
        $id=Auth::schoolType();
        $school_type_ids=explode('|', $id);
        $classes = MasterClass::whereIn('school_type_id', $school_type_ids)->get();
        $group_classes=GroupClass::all();
        $units=Unit::where('school_id',Auth::getSchool())->get();
        $online_class=OnlineClassUs::where(['created_by'=>Auth::id(),'school_id'=>Auth::getSchool(),'id'=>$oc_id])->first();
        return view('backEnd.online_class_us.edit',compact('online_class','classes','group_classes','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OnlineClassUs  $onlineClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except('_token');
        $this->validate($request, [
            'title' => 'required',
            'link' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);
       if ($request->type==1) {
        
            $this->validate($request, [
                'master_class_id' => 'required',
                'group' => 'required',
                'section' => 'required',
                'shift' => 'required',
            ]);
        }
        if ($request->type==2  ) {
            $data['master_class_id']=0;
            $data['group']=0;
            $data['section']=0;
            $data['shift']=0;
        }
        
        OnlineClassUs::where(['id'=>$id,'created_by'=>Auth::id(),'school_id'=>Auth::getSchool()])->update($data);
        return $this->returnWithSuccessRedirect('আপনার তথ্য সংরক্ষণ হয়েছে !','online_class_us');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OnlineClassUs  $onlineClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::is('teacher')  || Auth::is('admin')){
        }else{
            return redirect('/home');
        }
        OnlineClassUs::where(['id'=>$id,'created_by'=>Auth::id(),'school_id'=>Auth::getSchool()])->delete();
        return $this->returnWithSuccessRedirect('আপনার তথ্য মুছেফেলা হয়েছে !','online_class_us');
    }

    public function student_class()
    {
        if(!Auth::is('student')){
            return redirect('/home');
        }
         $student_details=student::where(['school_id'=>Auth::getSchool(),'user_id'=>Auth::id()])->first();
         $online_class=OnlineClassUs::where(['group'=>$student_details->group,'school_id'=>Auth::getSchool(),'type'=>1])->get();
        //dd($online_class);
        return view('backEnd.online_class_us.student_class',compact('online_class'));
    }
    public function staff_class()
    {
        if(Auth::is('teacher') || Auth::is('admin') || Auth::is('commitee') || Auth::is('staff')){
            
        }else{
            return redirect('/home');
        }
        $online_class=OnlineClassUs::where(['school_id'=>Auth::getSchool(),'type'=>2])->get();
        //dd($online_class);
        return view('backEnd.online_class_us.student_class',compact('online_class'));
    }
    
    public function link()
    {
        $school=School::where(['id'=>Auth::getSchool(),'online_class_access'=>1])->first();
        if ($school) {
            return redirect('https://us.worldehsan.org/');
        }else{
            return $this->returnWithError(' ইহসান অনলাইন কনফারেন্সে আপনার অনুমতি নেই !');
        }
    }
}
