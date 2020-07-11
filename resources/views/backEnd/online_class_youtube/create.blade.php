@extends('backEnd.master')

@section('mainTitle', 'Online Class')
@section('online_class_youtube', 'active')
@section('head_section')
    <style>

    </style>
@endsection
@section('active_notice', 'active')
@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">অনলাইন ক্লাস</h1>
        </div>

        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif

        <div id="error_div" style="display: none; margin-bottom: 10px;" class="col-sm-8 col-sm-offset-2 alert-danger">
            <p class="text-center error" style=""></p>
        </div>

        <div class="panel-body">
            <form action="{{url('/online_class_youtube/create')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('link') ? 'has-error' : ''}}">
                            <label class="" for="link">লিঙ্ক <span class="star">* ( লিঙ্ক টি https://www.youtube.com/watch?v= এর পর থেকে ব্যবহার করুন)</span></label>
                            <div class="">
                                <input value="{{old('link')}}" type="text" name="link" class="form-control" placeholder="লিঙ্ক">
                            </div>
                            @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{$errors->first('link')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label class="" for="title">টাইটেল <span class="star">*</span></label>
                            <div class="">
                                <input value="{{old('title')}}" type="text" name="title" class="form-control" placeholder="টাইটেল">
                            </div>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{$errors->first('title')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                
                   <div class="col-sm-6">
                       <div class="form-group {{$errors->has('master_class_id') ? 'has-error' : ''}}">
                           <label class="" for="master_class_id">শ্রেণী <span class="star">*</span></label>
                           <div class="">
                               <select class="form-control" name="master_class_id" id="master_class_id">
                                   <option value="">শ্রেণী নির্বাচন করুন</option>
                                   @foreach($classes as $class)
                                   <option value="{{$class->id}}">{{$class->name}}</option>
                                   @endforeach

                               </select>
                           </div>
                           @if ($errors->has('master_class_id'))
                               <span class="help-block">
                                   <strong>{{$errors->first('master_class_id')}}</strong>
                               </span>
                           @endif
                       </div>
                   </div> 
               
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('shift') ? 'has-error' : ''}}">
                            <label class="" for="shift">শিফট <span class="star">*</span></label>
                            <div class="">
                                <select class="form-control" name="shift" id="shift">
                                    <option value="">শিফট নির্বাচন করুন</option>
                                    <option value="সকাল">সকাল</option>
                                    <option value="দিন">দিন</option>
                                    <option value="সন্ধ্যা">সন্ধ্যা</option>
                                    <option value="রাত">রাত</option>
                                </select>
                            </div>
                            @if ($errors->has('shift'))
                                <span class="help-block">
                                    <strong>{{$errors->first('shift')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('section') ? 'has-error' : ''}}">
                            <label class="" for="section">শাখা <span class="star">*</span></label>
                            <div class="">
                                <select class="form-control" name="section" id="section">
                                    <option value="">...শাখা নির্বাচন করুন...</option>
                                    <option value="ক">ক</option>
                                    <option value="খ">খ</option>
                                    <option value="গ">গ</option>
                                    <option value="ঘ">ঘ</option>
                                    @foreach($units as $unit)
                                    <option value="{{$unit->name}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('section'))
                                <span class="help-block">
                                    <strong>{{$errors->first('section')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('group') ? 'has-error' : ''}}">
                            <label class="" for="group">গ্রুপ / বিভাগ <span class="star">*</span></label>
                            <div class="">
                                <select class="form-control" name="group" id="group">
                                    <option value="">গ্রুপ / বিভাগ নির্বাচন করুন</option>
                                    @foreach($group_classes as $group_class)
                                    <option value="{{$group_class->name}}">{{$group_class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('group'))
                                <span class="help-block">
                                    <strong>{{$errors->first('group')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('type') ? 'has-error' : ''}}">
                            <label class="" for="type">ব্যবহারকারী <span class="star">*</span></label>
                            <div class="">
                                <select class="form-control" name="type" id="type">
                                    <option value="">ব্যবহারকারী</option>
                                    <option value="1">শিক্ষার্থী</option>
                                    <option value="2">কর্মচারী</option>
                                </select>
                            </div>
                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{$errors->first('type')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button id="save" type="submit" class="btn btn-block btn-info">সংরক্ষণ করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if($errors->any())
        <script type="text/javascript">
            document.getElementById('master_class_id').value="{{old('master_class_id')}}";
            document.getElementById('shift').value="{{old('shift')}}";
            document.getElementById('section').value="{{old('section')}}";
            document.getElementById('group').value="{{old('group')}}";
        </script>
    @endif
@endsection
@section('script')
<script src="{{asset('/backEnd/js/jscolor.js')}}"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'description' );
  </script>
  <link rel="stylesheet" href="{{asset('backEnd/css/jquery-ui.css')}}">
    <script src="{{asset('backEnd/js/jquery-ui.js')}}"></script>
    <script>
        $( function() {
            $( ".date" ).datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            }).val();
        } );
    </script>
    <script>
        $( function() {
            $( ".date1" ).datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            }).val();
        } );
    </script>
@endsection
