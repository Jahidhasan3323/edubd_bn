<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Holiday;
use Session;
use DB;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $months = Array ('January','February','March','April','May','June','July','August','September','October','November','December');

    public function index()
    {
        $holidays =Holiday::where(['school_id'=>Auth::getSchool()])
                           ->whereYear('date', '=', date('Y'))
                           ->groupBy(DB::raw('MONTH(date)'))
                           ->select('*', DB::raw('count(*) as total'))
                           ->get();
        $months = $this->months;
        return view('backEnd.holiday.index',compact('holidays','months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $months = $this->months;
        $days = array();
        if($request->all()){
            $this->validate($request,[
                'year'=>'required',
                'month'=>'required',
            ]);
            $num_of_days = date('t',mktime (0,0,0,$request->month,1,$request->year));
            for( $i=1; $i<= $num_of_days; $i++) {
               $time=mktime(0, 0, 0, $request->month, $i, $request->year);
               $days[] = date('l d-m-Y', $time);
            }
        }
        $months = json_encode($months);
        $days = json_encode($days);
        $search = $request->except('_token');
        return view('backEnd.holiday.create',compact('days','months','search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
           foreach ($request->date as $key => $date) {
               $data['date']=date('Y-m-d',strtotime($date));
               $data['school_id']=Auth::getSchool();
               $check = Holiday::where($data)->get();
               if(count($check)<1){
                 Holiday::create($data);
               }
           }

           Session::flash('sccmgs', 'ছুটি সফলভাবে যোগ করা হয়েছে !');
           return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('errmgs', 'দুঃখিত, সমস্যা হয়েছে !'.$e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($month,$year)
    {
        $holidays = Holiday::where('school_id',Auth::getSchool())
        ->whereYear('date', '=', $year)
        ->whereMonth('date', '=', $month)
        ->select('date')->get();
        $months = $this->months;
        return view('backEnd.holiday.show',compact('holidays','month','year','months'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($month, $year)
    {
        $holidays = Holiday::where(['school_id'=>Auth::getSchool()])
                  ->whereYear('date', '=', $year)
                  ->whereMonth('date', '=', $month)
                  ->select('date')->get();
        $date=array();
        foreach ($holidays as $key => $holiday) {
            $date[]=$holiday->date->format('d-m-Y');
        }
         $days = array();
         $num_of_days = date('t',mktime (0,0,0,$month,1,$year));
         for( $i=1; $i<= $num_of_days; $i++) {
            $time=mktime(0, 0, 0, $month, $i, $year);
            $days[] = date('l d-m-Y', $time);
         }
         $days = json_encode($days);
         return view('backEnd.holiday.edit',compact('year','month','days','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $month,$year)
    {
        try {
           Holiday::where('school_id',Auth::getSchool())
           ->whereYear('date', '=', $year)
           ->whereMonth('date', '=', $month)
           ->delete();

           foreach ($request->date as $key => $date) {
               $data['date']=date('Y-m-d',strtotime($date));
               $data['school_id']=Auth::getSchool();
               Holiday::create($data);
           }

           Session::flash('sccmgs', 'ছুটি সফলভাবে আপডেট করা হয়েছে !');
           return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('errmgs', 'দুঃখিত, সমস্যা হয়েছে !'.$e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($month,$year)
    {
        try {
           Holiday::where('school_id',Auth::getSchool())
            ->whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->delete();
           Session::flash('sccmgs', 'ছুটি সফলভাবে মুছে ফেলা হয়েছে !');
           return redirect('holiday');
        } catch (\Exception $e) {
            Session::flash('errmgs', 'দুঃখিত, সমস্যা হয়েছে !'.$e->getMessage());
            return redirect()->back();
        }
    }
}