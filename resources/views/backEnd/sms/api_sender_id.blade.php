@extends('backEnd.master')

@section('mainTitle', 'প্রতিষ্ঠানের এপি,আই  ও সেন্ডার আইডি')
@section('active_school', 'active')

@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">প্রতিষ্ঠানের এপি,আই  ও সেন্ডার আইডি</h1>
        </div>

        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif

        <div class="panel-body">
            <div class="table-responsive">
                <table id="api_sender_id_tbl" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">ক্রমিক</th>
                            <th class="text-center">প্রতিষ্ঠান</th>
                            <th class="text-center">এপি,আই</th>
                            <th class="text-center">সেন্ডার আইডি</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-left">{{ $user['name'] }}</td>
                                <td class="text-left">{{ $user['api_key'] }}</td>
                                <td class="text-left">{{ $user['sender_id'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
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
            $('#api_sender_id_tbl').DataTable();
        } );
    </script>
@endsection