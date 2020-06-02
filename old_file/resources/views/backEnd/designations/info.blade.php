@extends('backEnd.master')

@section('mainTitle', 'Designations Information')
@section('active_designation', 'active')

@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">স্টাফ পদ তালিকা</h1>
        </div>

        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif

        <div class="panel-body">
            <table class="table table-bordered table-responsive table-hover table-striped">
                <tr>
                    <th>ক্রমিক নং</th>
                    <th>নাম</th>
                    @if (Auth::is('root'))
                    <th>অ্যাকশন</th>
                    @endif
                </tr>
                @php($serial = Get::serial($designations))
                @foreach($designations as $designation)
                    <tr>
                        <td>{{$serial}}</td>
                        <td>{{$designation->name}}</td>
                        @if (Auth::is('root'))
                        <td>
                            <a style="margin-bottom: 10px;" href="{{url('/designations/'.$designation->id.'/edit')}}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
                                <a style="margin-bottom: 10px" href="#"  onclick="clickFunction{{$designation->id}}()"
                                   class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                </a>
                            <form style="display: none;" id="delete-form{{$designation->id}}" method="post" action="{{url('/designations/'.$designation->id)}}" style="padding: 0; margin: 0; outline: 0;">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                            </form>
                        </td>
                        @endif
                    </tr>
                    <script>
                        function clickFunction{{$designation->id}}() {
                            if (confirm("Are you sure to delete this?")){
                                document.getElementById("delete-form{{$designation->id}}").submit();
                            }
                        }
                    </script>
                    @php($serial++)
                @endforeach
            </table>
        </div>
    </div>
@endsection
