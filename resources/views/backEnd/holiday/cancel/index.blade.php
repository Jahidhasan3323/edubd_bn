@extends('backEnd.master')

@section('mainTitle', 'ছুটির বাতিলের তালিকা')
@section('active_class1', 'active')

@section('content')
    
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">ছুটি বাতিলের তালিকা</h1>
        </div>


        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif
        <div class="panel-body">
           <div class="table-responsive">
            <table id="subject_tbl" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th># ক্রমিক নং</th>
                        <th>মাস</th>
                        <th>বছর</th>
                        <th>মোট ছুটি</th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                <?php $x = 1; ?>
                @foreach($cancel_holidays as $cancel_holiday)
                      <tr>
                        <td>{{$x++}}</td>
                        <td>{{str_replace($s, $r, $months[$cancel_holiday->date->format('m')-1])}}</td>
                        <td>{{str_replace($s, $r, $cancel_holiday->date->format('Y'))}}</td>
                        <td>{{str_replace($s, $r, $cancel_holiday->total)}}</td>
                        <td>
                            <a style="" href="{{url('/holiday-cancel/show',[$cancel_holiday->date->format('m'),$cancel_holiday->date->format('Y')])}}" class="btn btn-info">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                        <tfoot>
                           <tr>
                                <th># ক্রমিক নং</th>
                                <th>মাস</th>
                                <th>বছর</th>
                                <th>মোট ছুটি</th>
                                <th>অ্যাকশন</th>
                           </tr>
                        </tfoot>
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
    $('#subject_tbl').DataTable();
} );
</script>
@endsection


