@extends('backEnd.master')

@section('mainTitle', 'Login Info')

@section('active_login_info', 'active')

@section('content')
    <div class="panel col-md-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">কমিটিদের লগিনের তথ্যাবলী</h1>
        </div>

        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif
        <div class="col-md-12" style="border: 1px solid #ddd;">
            <h4 style="margin-bottom: 20px;" class="text-center">প্রতিষ্ঠান নির্বাচন করুন</h4>
            <div class="row col-md-8 col-md-offset-2">
                <form action="{{route('committee_password_reset')}}" method="post" target="_blank">
                    {{csrf_field()}}
                    <div class="col-md-12 {{$errors->has('school_id') ? 'has-error' : ''}}">
                        <div class="form-group">
                            <select class="form-control" name="school_id" id="school_id">
                                @foreach($schools as $school)
                                    <option value="{{$school->id}}" >{{$school->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('school_id'))
                        <span class="help-block">
                            <strong>{{$errors->first('school_id')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <br>
                            <center>
                                <button type="submit" class="btn btn-primary">অনুসন্ধান</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript">
        function checkNumber(){
            // Check #x
            if($("#all_check").prop('checked') == true){
                $(".number").prop( "checked", true );
            }else{
                $(".number").prop( "checked", false );
            }
        }
    </script>
@endsection
