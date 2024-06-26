@extends('backEnd.master')

@section('mainTitle', 'Manage Schools Class Info')
@section('active_class1', 'active')

@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">শ্রেণি তৈরি করুন</h1>
        </div>
        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif
        <div class="panel-body">
            <form action="{{url('/class/store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="name">শ্রেণির নাম<span class="star">*</span></label>
                            <input class="form-control" type="text" placeholder="Type a class name.." id="name" name="name">
                              
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="type">স্কুল টাইপ নির্বাচন করুন<span class="star">*</span></label>
                            <select name="school_type_id" id="type" class="form-control">
                                <option value="">টাইপ নির্বাচন করুন</option>
                                @foreach($school_types as $school_type)
                                <option value="{{$school_type->id}}">{{$school_type->type}}</option>
                                @endforeach
                            </select>
                              
                            @if ($errors->has('school_type_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('school_type_id')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <hr>
                <div class="">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset">
                            <div class="form-group">
                                <button id="save_btn" type="submit" class="btn btn-block btn-info">সংরক্ষণ করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

       
    </div>
@endsection
