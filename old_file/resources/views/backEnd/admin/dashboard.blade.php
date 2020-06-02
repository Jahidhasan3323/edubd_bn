@extends('backEnd.master')

@section('mainTitle', 'System Dathboard')

@section('content')

    @if(Auth::is('admin'))
        <div class="alert-danger" style="display: none;" id="expiry_error">
            @if(Get::expiry() >= 0 && Get::expiry() < 30)
                <button id="dismis" style="float:right"><span class="glyphicon glyphicon-remove"></span></button>
                <p class="text-danger text-center" style="padding: 5px">{{Get::expiryDays()}}</p>
            @endif
        </div>
    @endif
    <div id="page-inner">
        <div class="row">
            @if(Session::has('errmgs'))
                @include('backEnd.includes.errors')
            @endif
            @if(Session::has('sccmgs'))
                @include('backEnd.includes.success')
            @endif
            <div class="col-md-12">
                
                <h2>
                    @if(!Auth::is('root'))
                        @php($school = \App\School::find(Auth::getSchool()))
                        {{$school->user->name}} অনলাইন সিস্টেম
                    @else
                        অ্যাডমিন ড্যাশবোর্ড
                    @endif
                </h2>
                <h5>স্বাগত {{Auth::user()->name}}. </h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            @if(isset($users))
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-users"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{$users}} ব্যবহারকারী</p>
                            <p class="text-muted">সকল ব্যবহারকারী</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($schools))
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-green set-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{str_replace($s, $r,$schools)}} প্রতিষ্ঠান</p>
                            <p class="text-muted">সব ক্লায়েন্ট</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($students))
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-users"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{str_replace($s, $r,$students)}} শিক্ষার্থী</p>
                            <p class="text-muted">সব শিক্ষার্থী</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($teachers))
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                        <div class="text-box">
                            <p class="main-text">{{str_replace($s, $r,$teachers)}} শিক্ষক</p>
                            <p class="text-muted">সব শিক্ষক</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($staff))
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                        <div class="text-box">
                            <p class="main-text">{{str_replace($s, $r,$staff)}} কর্মচারী</p>
                            <p class="text-muted">সব কর্মচারী</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(isset($commitee))
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-users"></i>
                    </span>
                        <div class="text-box">
                            <p class="main-text">{{str_replace($s, $r,$commitee)}} কমিটি</p>
                            <p class="text-muted">সব কমিটি</p>
                        </div>
                    </div>
                </div>
            @endif


            
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">

            <!-- /. ROW  -->
            <div class="row text-center pad-top">
                @if(Auth::is('root'))
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/schools')}}">
                                <i class="fa fa-bars fa-5x" style="color: #246630"></i>
                                <h4>প্রতিষ্ঠানের তালিকা দেখুন</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/school_users')}}">
                                <i class="fa fa-users fa-5x" style="color: #246630"></i>
                                <h4>ব্যবহারকারীর  তথ্য দেখুন</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/class')}}">
                                <i class="fa fa-sitemap fa-5x" style="color: #3AAECD"></i>
                                <h4>শ্রেণীর তথ্য</h4>
                            </a>
                        </div>
                    </div>
                @endif
                @if(Auth::is('root')||Auth::is('admin')||Auth::is('student'))

                @if(!Auth::is('student'))
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="{{url('/designations')}}">
                            <i class="fa fa-bullseye fa-5x" style="color: green"></i>
                            <h4>স্টাফদের পদবী দেখুন</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="{{url('/examTypes')}}">
                            <i class="fa fa-bullseye fa-5x" style="color: black"></i>
                            <h4>পরীক্ষার ধরন তালিকা </h4>
                        </a>
                    </div>
                </div>
                @endif
                @if(!Auth::is('root'))
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <div class="div-square">
                        <a href="{{url('/subjects')}}">
                            <i class="fa fa-book fa-5x" style="color: red"></i>
                            <h4>বিষয় তথ্য দেখুন</h4>
                        </a>
                    </div>
                </div>
                @endif
                @endif
                @if(Auth::is('admin'))
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/classes')}}">
                                <i class="fa fa-sitemap fa-5x" style="color: #3AAECD"></i>
                                <h4>শ্রেণীর তথ্য দেখুন</h4>
                            </a>
                        </div>
                    </div>
                @endif

                @if(Auth::is('admin') || Auth::is('teacher')||Auth::is('staff') ||Auth::is('commitee') ||Auth::is('student'))
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/staff')}}">
                                <i class="fa fa-user fa-5x" style="color: green"></i>
                                <h4>কর্মচারীদের তালিকা দেখুন </h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/commitee')}}">
                                <i class="fa fa-user fa-5x" style="color: green"></i>
                                <h4>কমিটির তালিকা দেখুন</h4>
                            </a>
                        </div>
                    </div>

                    @if(!Auth::is('commitee')&&!Auth::is('student'))
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/students_list')}}">
                                <i class="fa fa-user fa-5x" style="color: #3AAECD"></i>
                                <h4>শিক্ষার্থীদের তালিকা দেখুন</h4>
                            </a>
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/classRoutines')}}">
                                <i class="fa fa-clipboard fa-5x" style="color: #2046CF"></i>
                                <h4>ক্লাস রুটিন</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/examRoutines')}}">
                                <i class="fa fa-clipboard fa-5x" style="color: #DE6E04"></i>
                                <h4>পরীক্ষার রুটিন</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="div-square">
                            <a href="{{url('/result')}}">
                                <i class="fa fa-indent fa-5x" style="color: #000"></i>
                                <h4>ফলাফল দেখুন</h4>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            
    </div>
@endsection
@section('script')
    <script src="{{asset('backEnd/js/jquery-3.1.1.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#expiry_error').fadeIn();
            $('#dismis').on('click', function () {
                $('#expiry_error').fadeOut();
            });
        })
    </script>

@endsection