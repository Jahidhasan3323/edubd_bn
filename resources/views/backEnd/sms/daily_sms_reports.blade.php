@extends('backEnd.master')

@section('mainTitle', 'প্রতিষ্ঠান ভিত্তিক দৈনিক এস,এম,এস রিপোর্ট')
@section('active_sms_login_info', 'active')

@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">প্রতিষ্ঠান ভিত্তিক দৈনিক এস,এম,এস রিপোর্ট</h1>
        </div>

        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif

        <div class="panel-body">
            <div class="table-responsive">
                <table id="report_tbl" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ক্রমিক</th>
                            <th class="text-center">প্রতিষ্ঠান</th>
                            <th class="text-center">ইমেইল / ডোমেইন</th>
                            <th class="text-center">মোবাইল</th>
                            <th class="text-center">আজকের এস,এম,এস</th>
                            <th class="text-center">এস,এম,এস রেট</th>
                            <th class="text-center">আজকের এস,এম,এস খরচ </th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($daily_sms_reports as $daily_sms_report)
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-left">{{ $daily_sms_report['name'] }}</td>
                                <td class="text-left">
                                    {{ $daily_sms_report['email']??$daily_sms_report['domain'] }}
                                </td>
                                <td class="text-left">{{ $daily_sms_report['mobile'] }}</td>
                                <td class="text-center">
                                    {{ ceil($daily_sms_report['cost']/$daily_sms_report['sms_rate']) }}
                                </td>
                                <td class="text-center">
                                    {{ number_format( $daily_sms_report['sms_rate'],2) }} ৳
                                </td>
                                <td class="text-center">
                                    {{ number_format($daily_sms_report['cost'],2) }} ৳
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('backEnd')}}/DataTables/jquery.dataTables.min.js"></script>
    <script src="{{asset('backEnd')}}/DataTables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#report_tbl').DataTable();
        } );
    </script>
@endsection
