@extends('backEnd.master')

@section('mainTitle', 'উপস্থিতি বার্তা')
@section('active_attendance_text', 'active')

@section('content')
    @if(Session::has('errmgs'))
        @include('backEnd.includes.errors')
    @endif
    @if(Session::has('sccmgs'))
        @include('backEnd.includes.success')
    @endif

    <div class="panel col-md-6" style="border: 1px solid #ddd;">
        <div class="page-header">
            <h1 class="text-center text-temp">উপস্থিত বার্তার তালিকা</h1>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="attend_tbl" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ক্রমিক</th>
                            <th class="text-center">প্রতিষ্ঠান</th>
                            <th class="text-center">বার্তা</th>
                            <th class="text-center">অ্যাকশন</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($attends as $attend)
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $attend->school->user->name }}</td>
                                <td>{{ $attend->content }}</td>
                                <td class="text-center">
                                   <a href="{{ route('attendanceText.edit', $attend->id) }}" style="margin: 1px;">
                                       <button type="button" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </button>
                                   </a>
                                   <a href="{{ route('attendanceText.delete', $attend->id) }}">
                                       <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('আপনি কি বার্তাটি মুছে ফেলতে চান ?')"> <i class="fa fa-trash-o"></i> </button>
                                   </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="panel col-md-6" style="border: 1px solid #ddd;">
        <div class="page-header">
            <h1 class="text-center text-temp">অনুপস্থিত বার্তার তালিকা</h1>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="absent_tbl" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ক্রমিক</th>
                            <th class="text-center">প্রতিষ্ঠান</th>
                            <th class="text-center">বার্তা</th>
                            <th class="text-center">অ্যাকশন</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($absents as $absent)
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $absent->school->user->name }}</td>
                                <td>{{ $absent->content }}</td>
                                <td class="text-center">
                                   <a href="{{ route('attendanceText.edit', $absent->id) }}">
                                       <button type="button" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </button>
                                   </a>
                                   <a href="{{ route('attendanceText.delete', $absent->id) }}">
                                       <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('আপনি কি বার্তাটি মুছে ফেলতে চান ?')"> <i class="fa fa-trash-o"></i> </button>
                                   </a>
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
            $('#attend_tbl').DataTable();
        } );
        $(document).ready(function() {
            $('#absent_tbl').DataTable();
        } );
    </script>
@endsection