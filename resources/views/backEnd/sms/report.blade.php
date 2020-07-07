@extends('backEnd.master')

@section('mainTitle', 'SMS Report')

@section('content')
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2>
                        @if(!Auth::is('root'))
                            @php($school = \App\School::find(Auth::getSchool()))
                            {{$school->user->name}} <small>(এস,এম,এস ড্যাশবোর্ড)</small>
                        @else
                            এস,এম,এস ড্যাশবোর্ড
                        @endif
                    </h2>
                    <h5> {{Auth::user()->school->address}}. </h5>
                </center>    
            </div>
        </div>
        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            @if(isset($report))
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-money"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['total_sms_cost'],2)) }} টাকা</p>
                            <p class="text-muted">মোট এস,এম,এসের খরচ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['total_send_sms'])) }}</p>
                            <p class="text-muted">মোট পাঠানো এস,এম,এস</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-money"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['month_sms_costs'],2)) }} টাকা</p>
                            <p class="text-muted">বর্তমান মাসের এস,এম,এসের খরচ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['monthly_send_sms'])) }}</p>
                            <p class="text-muted">বর্তমান মাসের পাঠানো এস,এম,এস</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-money"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['direct_sms_cost'],2)) }} টাকা</p>
                            <p class="text-muted">ডিরেক্ট এস,এম,এসের খরচ</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-money"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['total_balance'],2)) }} টাকা</p>
                            <p class="text-muted">মোট রিচার্জের পরিমান </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 ">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-money"></i>
                        </span>
                        <div class="text-box">
                            <p class="main-text">{{ str_replace($s,$r,number_format($report['current_balance'],2)) }} টাকা</p>
                            <p class="text-muted">বর্তমান ব্যলেন্স</p>
                        </div>
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