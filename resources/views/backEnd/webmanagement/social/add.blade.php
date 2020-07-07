@extends('backEnd.master',['nav'=>'active'])

@section('mainTitle', 'সোশ্যাল মিডিয়া লিঙ্ক')
@section('head_section')
    <style>

    </style>
@endsection
@section('social_link', 'active')
@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">সোশ্যাল মিডিয়া লিঙ্ক</h1>
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
            <form action="{{url('/social_link')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
               <div class="row">
                  <div class="col-sm-12">
                   <div class="row">
                       <div class="col-sm-2">
                           <div class="form-group ">
                               <label for="photo">ফেসবুক লিঙ্ক <span class="star">(<i class="fa fa-facebook"></i>)</span> </label>
                           </div>
                       </div>
                       <div class="col-sm-8">
                           <div class="form-group {{$errors->has('facebook') ? 'has-error' : ''}}">
                            
                              <input type="text" name="facebook" class="form-control" placeholder="ফেসবুক" data-validation=" length " data-validation-length="max100" value="@if (isset($link->facebook)){{$link->facebook}}@endif">
                              @if ($errors->has('facebook'))
                                  <span class="help-block">
                                      <strong>{{$errors->first('facebook')}}</strong>
                                  </span>
                              @endif
                          </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-2">
                           <div class="form-group ">
                               <label for="photo">ইউটিউব লিঙ্ক <span class="star">(<i class="fa fa-youtube"></i>)</span></label>
                           </div>
                       </div>
                       <div class="col-sm-8">
                           <div class="form-group {{$errors->has('youtube') ? 'has-error' : ''}}">
                            
                              <input type="text" name="youtube" class="form-control" placeholder="ইউটিউব" data-validation=" length " data-validation-length="max100" value="@if (isset($link->youtube)){{$link->youtube}}@endif">
                              @if ($errors->has('youtube'))
                                  <span class="help-block">
                                      <strong>{{$errors->first('youtube')}}</strong>
                                  </span>
                              @endif
                          </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-2">
                           <div class="form-group ">
                               <label for="photo">টুইটার লিঙ্ক <span class="star">(<i class="fa fa-twitter"></i>)</span></label>
                           </div>
                       </div>
                       <div class="col-sm-8">
                           <div class="form-group {{$errors->has('twitter') ? 'has-error' : ''}}">
                            
                              <input type="text" name="twitter" class="form-control" placeholder="টুইটার" data-validation=" length " data-validation-length="max100" value="@if (isset($link->twitter)){{$link->twitter}}@endif">
                              @if ($errors->has('twitter'))
                                  <span class="help-block">
                                      <strong>{{$errors->first('twitter')}}</strong>
                                  </span>
                              @endif
                          </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-2">
                           <div class="form-group ">
                               <label for="photo">লিঙ্কডইন লিঙ্ক <span class="star">(<i class="fa fa-linkedin"></i>)</span></label>
                           </div>
                       </div>
                       <div class="col-sm-8">
                           <div class="form-group {{$errors->has('linkedin') ? 'has-error' : ''}}">
                            
                              <input type="text" name="linkedin" class="form-control" placeholder="লিঙ্কডইন" data-validation=" length " data-validation-length="max100" value="@if (isset($link->linkedin)){{$link->linkedin}}@endif">
                              @if ($errors->has('linkedin'))
                                  <span class="help-block">
                                      <strong>{{$errors->first('linkedin')}}</strong>
                                  </span>
                              @endif
                          </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-sm-2">
                           <div class="form-group ">
                               <label for="photo">পিন্টারেস্ট লিঙ্ক <span class="star">(<i class="fa fa-pinterest"></i>)</span></label>
                           </div>
                       </div>
                       <div class="col-sm-8">
                           <div class="form-group {{$errors->has('pinterest') ? 'has-error' : ''}}">
                            
                              <input type="text" name="pinterest" class="form-control" placeholder="পিন্টারেস্ট" data-validation=" length " data-validation-length="max100" value="@if (isset($link->pinterest)){{$link->pinterest}}@endif">
                              @if ($errors->has('pinterest'))
                                  <span class="help-block">
                                      <strong>{{$errors->first('pinterest')}}</strong>
                                  </span>
                              @endif
                          </div>
                       </div>
                   </div>
                 </div>
               </div>
                <hr>

                <div class="">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <button id="save" type="submit" class="btn btn-block btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
   @if($errors->any())
    <script type="text/javascript">
        document.getElementById('type').value="{{old('type')}}";
    </script>
    @endif
@endsection

@section('script')
<script src="{{asset('/backEnd/js/jscolor.js')}}"></script>
  <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( '' );
  </script>
@endsection