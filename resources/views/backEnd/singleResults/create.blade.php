@extends('backEnd.master')

@section('mainTitle', 'Result Entry')
@section('head_section')
    <style>
       .select2-selection.select2-selection--single {
            height:  35px;
        }
    </style>
@endsection
@section('active_result', 'active')

@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">ফলাফল এন্ট্রি করুন</h1>
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

        <div id="success_div" style="display: none; margin-bottom: 10px;" class="col-sm-8 col-sm-offset-2 alert-success">
            <p class="text-center success" style=""></p>
        </div>

        <div class="panel-body">
            <form name="add-result-form" action="{{url('single-result/search/make')}}" method="get" >
                    {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('master_class_id') ? 'has-error' : ''}}">
                            <label class="" for="class">শ্রেণী <span class="star">*</span></label>
                            <select name="master_class_id" id="class" class="form-control" required="">
                                <option value="">...শ্রেণী নির্বাচন করুন...</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('group_class_id') ? 'has-error' : ''}}">
                            <label class="" for="group1">গ্রুপ / বিভাগ <span class="star">*</span></label>
                            <select name="group_class_id" id="group1" class="form-control" required="">
                                <option value="">...গ্রুপ / বিভাগ নির্বাচন করুন...</option>
                                @foreach($group_classes as $group_class)
                                  <option value="{{$group_class->id}}">{{$group_class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('shift') ? 'has-error' : ''}}">
                            <label class="" for="shift1">শিফট <span class="star">*</span></label>
                            <select name="shift" id="shift1" class="form-control" required="">
                                <option value="">...শিফট নির্বাচন করুন...</option>
                                <option value="সকাল">সকাল</option>
                                <option value="দিন">দিন</option>
                                <option value="সন্ধ্যা">সন্ধ্যা</option>
                                <option value="রাত">রাত</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('section') ? 'has-error' : ''}}">
                            <label class="" for="section1">শাখা <span class="star">*</span></label>
                            <select name="section" id="section1" class="form-control" required="">
                                <option value="">...শাখা নির্বাচন করুন...</option>
                                <option value="ক">ক</option>
                                <option value="খ">খ</option>
                                <option value="গ">গ</option>
                                <option value="ঘ">ঘ</option>
                                @foreach($units as $unit)
                                <option value="{!!$unit->name!!}">{!!$unit->name!!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5">
                            <div class="form-group">
                                <button id="save" type="submit" class="btn btn-block btn-success">অনুসন্ধান করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      <hr>
        @if(isset($students)&& count($students)>0)
            <form id="result_from" name="result_from" action="{{url('/single-result/store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('exam_type_id') ? 'has-error' : ''}}">
                            <label class="" for="class">পরীক্ষা <span class="star">*</span></label>
                            <select name="exam_type_id" id="exam_type_id" class="form-control">
                                <option value="">...পরীক্ষা নির্বাচন করুন...</option>
                                @foreach($exam_types as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('exam_type_id'))
                                <span class="help-block text-danger">
                                    <strong>{{$errors->first('exam_type_id')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('exam_year') ? 'has-error' : ''}}">
                            <label class="" for="exam_year">শিক্ষাবর্ষ <span class="star">*</span></label>
                            <div class="">
                                <select name="exam_year" id="exam_year" class="form-control">
                                <option value="">...শিক্ষাবর্ষ নির্বাচন করুন...</option>
                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                <option value="{{date('Y')-1}}">{{date('Y')-1}}</option>
                            </select>
                            </div>
                            @if ($errors->has('exam_year'))
                                <span class="help-block">
                                    <strong>{{$errors->first('exam_year')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('subject_id') ? 'has-error' : ''}}">
                            <label class="" for="subject_id">বিষয় <span class="star">*</span></label>
                            <div class="">
                                <select name="subject_id" id="subject_id" class="form-control" onchange="select_subject_details();" required="">
                                    <option value="">...বিষয় নির্বাচন করুন...</option>
                                    @foreach($subjects as $key=>$subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('subject_id'))
                                <span class="help-block">
                                    <strong>{{$errors->first('subject_id')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="subject_name" id="subject_name">
                    <input type="hidden" name="total_mark" id="total_mark">
                    <input type="hidden" name="ca_pass_mark" id="ca_pass_mark">
                    <input type="hidden" name="cr_pass_mark" id="cr_pass_mark">
                    <input type="hidden" name="mcq_pass_mark" id="mcq_pass_mark">
                    <input type="hidden" name="pr_pass_mark" id="pr_pass_mark">
                    <input type="hidden"  name="total_pass_mark" id="total_pass_mark">

                    <input type="hidden" name="subject_type" id="subject_type">

                    <div class="col-sm-3">
                        <div class="form-group {{$errors->has('subject_status') ? 'has-error' : ''}}">
                            <label class="" for="subject_status">সাবজেক্ট স্টেটাস<span class="star">*</span></label>
                            <div class="">
                                <select name="subject_status" id="subject_status" class="form-control">
                                    @if($errors->any())
                                    <option value="{{old('subject_status')}}">{{old('subject_status')}}</option>
                                    @endif
                                </select>
                            </div>
                            @if ($errors->has('subject_status'))
                                <span class="help-block">
                                    <strong>{{$errors->first('subject_status')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                <hr>
                <input type="hidden" value="{{$search['master_class_id'] ?? ''}}" name="master_class_id" id="master_class_id">
                <input type="hidden" value="{{$search['group_class_id']??''}}" name="group_class_id" id="group_class_id">
                <input type="hidden" value="{{$search['shift']??''}}" name="shift">
                <input type="hidden" value="{{$search['section']??''}}" name="section">
            @if(count($students)>0)
            <div class="row"> 
                <div class="{{in_array($search['master_class_id'],['8','9','10','11','12'])?'col-sm-3':'col-sm-4'}}">
                    <div class="form-group">
                       <input id="all_check" class="form-check-input" onclick="checkNumber()" type="checkbox"> 
                       <label for="all_check">সব চেক / আনচেক শিক্ষার্থী <span class="star">*</span></label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <label class="" for="roll">রোল <span class="star">*</span></label>
                    </div>
                </div>
                
                <div class="col-md-2" style="display: {{in_array($search['master_class_id'],['8','9','10','11','12'])?'block':'none'}};">
                    <div class="form-group">
                        <label class="" for="ca_mark[]">সিএ নম্বর</label>                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="" for="cr_mark">সিআর/তত্ত্বীয় নম্বর</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="" for="mcq_mark">এমসিকিউ নম্বর</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="" for="pr_mark">পিআর নম্বর</label>
                    </div>
                </div>

            </div>
            @endif

            @php $i=1; @endphp
            @foreach($students as $key=>$student)
                <div class="row" id="row{{$key}}"> 
                    <div class="{{in_array($search['master_class_id'],['8','9','10','11','12'])?'col-sm-3':'col-sm-4'}}">
                        <div class="form-group">
                            <div class="">
                                <input type="checkbox" class="form-check-input student" name="student_id[{{$student->roll}}]"  class="form-control" value="{{$student->student_id}}" id="defaultCheck{{$i}}">
                                <label class="form-check-label" for="defaultCheck{{$i++}}">
                                   {{$student->user->name}}
                                 </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <div class="">
                                <input type="text" placeholder="শ্রেণী রোল" name="roll[]" class="form-control" value="{{$student->roll}}" readonly="readonly">
                                <input type="hidden" name="regularity[]" value="{{$student->regularity}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2" style="display: {{in_array($search['master_class_id'],['8','9','10','11','12'])?'block':'none'}};">
                        <div class="form-group">
                            <div class="">
                                <input value="--" class="form-control" type="text" name="ca_mark[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="">
                                <input value="--" class="form-control" type="text" name="cr_mark[]">
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="">
                                <input value="--" class="form-control" type="text" name="mcq_mark[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="">
                                <input value="--" class="form-control" type="text" name="pr_mark[]">
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
                <hr>
                <div class="">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5">
                            <div class="form-group">
                                <button id="save" type="submit" class="btn btn-block btn-success">সংরক্ষণ করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
        </div>
    </div>
@endsection
@section('script')

   <script type="text/javascript">
       function checkNumber(){
           if($("#all_check").prop('checked') == true){
               $(".student").prop( "checked", true );
           }else{
               $(".student").prop( "checked", false );
           }
       }
   </script>
   <script type="text/javascript">
       function select_subject_details(){
        var master_class_id = $('#master_class_id').val();
        var group_class_id = $('#group_class_id').val();
        var subject_id = $('#subject_id').val();
        $.ajax({
            url: "{{url('single-result/get/subject')}}",
            type: 'get',
            data: {
                'master_class_id': master_class_id,
                'group_class_id': group_class_id,
                'subject_id': subject_id
            },
            success: function (data) {
                $('#total_mark').val(data.total_mark);
                $('#ca_pass_mark').val(data.ca_pass_mark);
                $('#cr_pass_mark').val(data.cr_pass_mark);
                $('#mcq_pass_mark').val(data.mcq_pass_mark);
                $('#pr_pass_mark').val(data.pr_pass_mark);
                $('#total_pass_mark').val(data.total_pass_mark);
                $('#subject_type').val(data.subject_type);
                $('#subject_name').val(data.subject_name);
                
                if(data.subject_type=='সাধারণ' && data.status=='আবশ্যিক'){
                  var html="<option value='আবশ্যিক'>আবশ্যিক</option>";
                }
                else if(data.subject_type=='সাধারণ' && data.status=='ঐচ্ছিক'){
                  var html="<option value='ঐচ্ছিক'>ঐচ্ছিক</option>";
                }

                else if(data.subject_type=='ধর্ম শিক্ষা'){
                 var html="<option value='আবশ্যিক'>আবশ্যিক</option>"; 
                }
                else{
                  var html="<option value=''>স্টেটাস নির্বাচন করুন</option><option value='আবশ্যিক'>আবশ্যিক</option><option value='ঐচ্ছিক'>ঐচ্ছিক</option>";
                }
                $('#subject_status').html(html);
            }
        });
       }
       function clear(){}
   </script>
   @if(isset($search) && $search!=NULL)
       <script>
           document.forms['add-result-form'].elements['master_class_id'].value="{{$search['master_class_id']}}";
           document.forms['add-result-form'].elements['group_class_id'].value="{{$search['group_class_id']}}";
           document.forms['add-result-form'].elements['shift'].value="{{$search['shift']}}";
           document.forms['add-result-form'].elements['section'].value="{{$search['section']}}";
       </script>
   @endif
   <script>
       document.forms['result_from'].elements['exam_year'].value="{{old('exam_year')}}";
       document.forms['result_from'].elements['subject_id'].value="{{old('subject_id')}}";
       document.forms['result_from'].elements['exam_type_id'].value="{{old('exam_type_id')}}";
   </script>
@endsection
