@extends('backEnd.master')

@section('mainTitle', 'পরামর্শ যোগ করুন')
@section('active_care', 'active')
@section('style')
<style type="text/css">
    .form-group {
    margin-bottom: 0;
}
</style>
@endsection
@section('content')
    <div class="panel col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="page-header">
            <h1 class="text-center text-temp">পরামর্শ যোগ করুন</h1>
        </div>

        @if(Session::has('errmgs'))
            @include('backEnd.includes.errors')
        @endif
        @if(Session::has('sccmgs'))
            @include('backEnd.includes.success')
        @endif

        <div class="panel-body">
            <form id="validate" name="validate" action="{{ route('problem.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="type" value="1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="col-sm-12">
                            <div class="form-group {{$errors->has('subject') ? 'has-error' : ''}}">
                                <label class="" for="subject">পরামর্শের বিষয় </label>
                                <div class="">
                                    <input value="{{old('subject')}}" class="form-control" type="text" name="subject" id="subject" placeholder="সমস্যার বিষয়">
                                </div>
                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('subject')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}">
                                <label class="" for="description">পরামর্শের বিবরণ <span class="star">*</span></label>
                                <div class="">
                                    <textarea name="description" rows="5" class="form-control"></textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('description')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
                            <label for="image">ছবি আপলোড করুন</label>
                            <div class="" style="width:210px;height:160px;border-radius:3px;">
                                <img id="image_show" src="{{ Storage::url('images/no_image.jpg') }}" alt="Image" width="200" height="150">
                            </div>
                            <input type="file" name="image" id="image" accept="image/*">
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{$errors->first('image')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>

                 <div class="">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-info">সংরক্ষণ করুন</button>
                            </div>
                        </div>
                    </div>
                </div>
                
        </form>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="{{asset('backEnd/css/jquery-ui.css')}}">
    <script src="{{asset('backEnd/js/jquery-ui.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_show').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image").change(function(){
                readURL(this);
            });
        });
    </script>
@endsection
