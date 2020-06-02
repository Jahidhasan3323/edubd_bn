<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu" style="">
            <li class="text-center" style="">
                <a href="
                    @if(Auth::is('admin'))
                    {{url('/schoolProfile')}}

                    @elseif(Auth::is('teacher'))
                    {{url('/teacherProfile')}}

                    @elseif(Auth::is('student'))
                    {{url('/studentProfile')}}
                    @else
                    {{url('/home')}}
                    @endif
                    "><img style="max-width: 100%; " src="{{Storage::url($photo)}}" class="user-image img-responsive"/>
                </a>
            </li>

            <li>
                <a class="active-menu" href="{{url('/home')}}"><i class="fa fa-dashboard fa-3x"></i> ড্যাশবোর্ড</a>
            </li>
            @if(Auth::is('admin'))
                <li class="@yield('active_sms')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>এসএমএস সার্ভিস ব্যাবস্থাপনা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/sms')}}">অনুপস্থিত ছাত্র বিজ্ঞপ্তি</a>
                        </li>
                        <li>
                            <a href="{{url('/sms/present-student')}}">উপস্থিত ছাত্র বিজ্ঞপ্তি</a>
                        </li>
                        <li>
                            <a href="{{url('/sms/create')}}">নোটিশ জন্য বিজ্ঞপ্তি</a>
                        </li>

                        <li>
                            <a href="{{url('/sms/contentCreate')}}">টেক্সট সেটিংস</a>
                        </li>
                        <li>
                            <a href="{{url('/sms/result')}}">ফলাফল প্রেরণ</a>
                        </li>
                        <li>
                            <a href="{{url('/sms/number-collection')}}">ফোন নম্বর সংগ্রহ</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::is('root'))
                <li class="@yield('active_school')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>প্রতিষ্ঠান ক্লায়েন্ট ব্যাবস্থাপনা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/schools/create')}}">প্রতিষ্ঠান যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/schools')}}">প্রতিষ্ঠানের তালিকা</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('active_sms_login_info')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>এস,এম,এস<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('smsLimit.sms_setup')}}">অটোমেটিক এস,এম,এস নির্ধারণ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('loginInfo.student')}}">সেন্ড শিক্ষার্থী লগিন ইনফো</a>
                        </li>
                        <li>
                            <a href="{{ route('loginInfo.employee')}}">সেন্ড কর্মকর্তা লগিন ইনফো</a>
                        </li>
                        <li>
                            <a href="{{ route('loginInfo.committee')}}">সেন্ড কমিটি লগিন ইনফো</a>
                        </li>
                        <li>
                            <a href="{{ route('rootSms.add')}}">প্রতিষ্ঠান ভিত্তিক বার্তা</a>
                        </li>
                        <li>
                            <a href="{{ route('rootSms.multi_school')}}">মাল্টি প্রতিষ্ঠান ভিত্তিক বার্তা</a>
                        </li>
                    </ul>
                </li>
                <li class="@yield('active_birthday_text')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>জন্মদিনের বার্তা<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('birthdayText.add')}}">বার্তা যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('birthdayText.list')}}">বার্তার তালিকা দেখুন</a>
                        </li>
                    </ul>
                </li>

                <li class="@yield('message_length')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>বার্তার লিমিট<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('messageLength.add')}}">বার্তার লিমিট নির্ধারণ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('messageLength.list')}}">বার্তার লিমিট তালিকা দেখুন</a>
                        </li>
                    </ul>
                </li>

                <li class="@yield('active_attendance_text')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>উপস্থিতি বার্তা সেটিংস<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('attendanceText.add')}}">উপস্থিতি বার্তা যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('attendanceText.list')}}">উপস্থিতি বার্তার তালিকা</a>
                        </li>
                        <li>
                            <a href="{{ route('attendanceTime.add')}}">উপস্থিতি সময় যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('attendanceTime.list')}}">উপস্থিতি সময় তালিকা</a>
                        </li>
                        <li>
                            <a href="{{ route('attendanceOption.list')}}">অটোমেটিক উপস্থিতি অপশন</a>
                        </li>
                    </ul>
                </li>
            @endif


            @if(Auth::is('root'))
                <li class="@yield('active_designation')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>কর্মকর্তাদের পদবী ব্যাবস্থাপনা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/designations/create')}}">পদবী যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/designations')}}">পদবি তথ্য</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin'))
                <li class="@yield('active_attendance')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>উপস্থিতি ব্যাবস্থাপনা<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('attendence/create')}}">উপস্থিতি এন্ট্রি</a>
                        </li>
                        <li>
                            <a href="{{url('menual/student-entry')}}">ম্যানুয়ালি শিক্ষার্থী উপস্থিতি এন্ট্রি</a>
                        </li>
                        <li>
                            <a href="{{url('menual/staff-entry')}}">ম্যানুয়ালি কর্মকর্তা উপস্থিতি এন্ট্রি</a>
                        </li>
                        <li>
                            <a href="{{url('attendence/student')}}">শিক্ষার্থী উপস্থিতি</a>
                        </li>
                        <li>
                            <a href="{{url('atten_employee')}}">কর্মকর্তা উপস্থিতি</a>
                        </li>
                        <li>
                            <a href="{{url('leave/create')}}">কর্মকর্তা এবং শিক্ষার্থী ছুটি এন্ট্রি</a>
                        </li>
                        <li>
                            <a href="{{url('attendence-report/create')}}">উপস্থিতির রিপোর্ট</a>
                        </li>
                    </ul>
                </li>
                <hr style="margin: 0;padding:0;display: none;">
            @endif

            @if(Auth::is('admin'))
                <li class="@yield('active_teacher')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>কর্মকর্তা ব্যাবস্থাপনা<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/staff/create')}}">কর্মকর্তা যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/staff')}}">কর্মকর্তার তথ্য</a>
                        </li>

                        <li>
                            <a href="{{url('/staff-old')}}">প্রাক্তন কর্মকর্তার তথ্য</a>
                        </li>

                        <li>
                            <a href="{{url('staff-regine')}}">দায়িত্ব ছাড়ছেন</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin')||Auth::is('commitee'))
                <li class="@yield('active_commitee')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>কমিটি ব্যাবস্থাপনা<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{url('/commitee/create')}}">কমিটি যোগ করুন</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{url('/commitee')}}">কমিটির তথ্য</a>
                        </li>

                        <li>
                            <a href="{{url('/commitee_old')}}">প্রাক্তন কমিটির তথ্য</a>
                        </li>

                    </ul>
                </li>
            @endif

            @if(Auth::is('admin'))
                <li class="@yield('active_student')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>শিক্ষার্থী ব্যাবস্থাপনা<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/students/create')}}">শিক্ষার্থী যোগ করুন</a>
                        </li>

                        <li>
                            <a href="{{url('/students_list')}}">সমস্ত শিক্ষার্থীদের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/old_students_list')}}">প্রাক্তন শিক্ষার্থীদের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/testimonial')}}">প্রশংসাপত্রের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/transfer_certificate')}}">ছাড়পত্রের তালিকা</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin'))
                <li class="@yield('active_class_promotion')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>শ্রেণি স্থানান্তর ব্যাবস্থাপনা<span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/promotion/menual')}}">শ্রেণি স্থানান্তর</a>
                        </li>
                    </ul>
                </li>
            @endif


            @if(Auth::is('admin')|| Auth::is('teacher') || Auth::is('student'))
                <li class="@yield('active_subject')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>বিষয় ব্যাবস্থাপনা<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{url('/subjects/create')}}">বিষয় যুক্ত করুন</a>
                        </li>
                        @endif

                        @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('student'))
                        <li>
                            <a href="{{url('/subjects')}}">বিষয়ের তথ্য</a>
                        </li>
                        @endif

                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{url('/subjectTeachers/create')}}">বিষয় ভিত্তিক  শিক্ষক</a>
                        </li>
                        @endif

                        @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('student'))
                        <li>
                            <a href="{{url('/subjectTeachers')}}">নির্ধারিত পরিসংখ্যান</a>
                        </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin')|| Auth::is('teacher') || Auth::is('student'))
                <li class="@yield('active_ca_subject')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>কন্টিনুয়াস এটাচমেন্ট ব্যাবস্থাপনা<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{url('/ca-subjects/create')}}">বিষয় যুক্ত করুন (সিএ)</a>
                        </li>
                        @endif

                        @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('student'))
                        <li>
                            <a href="{{url('/ca-subjects')}}">বিষয়ের তথ্য (সিএ)</a>
                        </li>
                        @endif
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{url('/ca-result/create')}}">ফলাফল এন্ট্রি করুন (সিএ)</a>
                        </li>
                        <li>
                            <a href="{{url('/ca-result/list')}}">ফলাফল হালনাগাদ করুন (সিএ)</a>
                        </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::is('root')||Auth::is('admin'))
                <li class="@yield('active_exam')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>পরীক্ষা ব্যাবস্থাপনা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('root'))
                            <li>
                                <a href="{{url('/examTypes/create')}}">পরীক্ষা ধরন যোগ করুন</a>
                            </li>
                            <li>
                                <a href="{{url('/examTypes')}}">পরীক্ষার ধরন তথ্য</a>
                            </li>
                            @endif

                            @if(Auth::is('admin'))
                            <li>
                                <a href="{{url('/schoolExams')}}">পরীক্ষার ধরন তথ্য</a>
                            </li>
                            @endif
                    </ul>
                </li>
            @endif
            @if(Auth::is('teacher')||Auth::is('admin')||Auth::is('student'))
                <li class="@yield('question')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>প্রশ্ন ব্যাবস্থাপনা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/mcq/question/create')}}">নৈর্ব্যক্তিক প্রশ্ন যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{url('mcq/question')}}">নৈর্ব্যক্তিক প্রশ্নের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('mcq/question/all')}}">সকল নৈর্ব্যক্তিক প্রশ্নের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('written/question/create')}}">লিখিত প্রশ্ন যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{url('written/question')}}">লিখিত প্রশ্নের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('written/question/all')}}">সকল লিখিত প্রশ্নের তালিকা</a>
                        </li>
                        @if(Auth::is('teacher')||Auth::is('admin'))

                        <li>
                            <a href="{{url('/exam/create')}}">প্রশ্নপ্ত্র যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{url('exam/mcq')}}">নৈর্ব্যক্তিক প্রশ্নপ্ত্রের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('exam/written')}}">লিখিত প্রশ্নপ্ত্রের তালিকা</a>
                        </li>

                        @endif
                    </ul>
                </li>
            @endif
            @if( Auth::is('student'))
                <li class="@yield('online_exam')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>অনলাইন পরীক্ষা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('student'))
                            <li>
                                <a href="{{url('/exam/mcq/student')}}">নৈর্ব্যক্তিক পরীক্ষা</a>
                             </li>
                             <li>
                                <a href="{{url('/exam/written/student')}}">লিখিত পরীক্ষা</a>
                             </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('student'))
                <li class="@yield('active_result')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>{{Auth::is('student') ? 'ফলাফল দেখুন' : 'ফলাফল ব্যাবস্থাপনা'}}<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(isset($imp_setting->result_entry_type)&&($imp_setting->result_entry_type=='single'))
                          @if(Auth::is('admin')||Auth::is('teacher'))
                           <li>
                               <a href="{{url('/single-result/create')}}">ফলাফল এন্ট্রি করুন (একক)</a>
                           </li>
                           <li>
                               <a href="{{url('/single-result/list')}}">ফলাফল হালনাগাদ করুন (একক)</a>
                           </li>
                          @endif
                        @else
                          @if(Auth::is('admin'))
                          <li>
                              <a href="{{url('/result/create')}}">ফলাফল এন্ট্রি করুন (সব)</a>
                          </li>
                          <li>
                              <a href="{{url('/result/edit')}}">ফলাফল হালনাগাদ করুন (সব)</a>
                          </li>
                          @endif
                        @endif
                          @if(Auth::is('admin'))
                            <li>
                                <a href="{{url('/result/to_publish')}}">ফলাফল প্রকাশ করুন</a>
                            </li>
                            <li>
                                <a href="{{url('/progress/class-card-create')}}">শ্রেণী ভিত্তিক প্রগ্রেস কার্ড</a>
                            </li>
                            <li>
                                <a href="{{url('/progress/create')}}">প্রগ্রেস কার্ড</a>
                            </li>
                            <li>
                                <a href="{{url('/result/tebulation-create')}}">শ্রেণী ভিত্তিক টেবুলেশন</a>
                            </li>
                            <li>
                                <a href="{{url('/result/class')}}">শ্রেণী ভিত্তিক ফলাফল</a>
                            </li>
                          @endif
                        <li>
                            <a href="{{url('/result')}}">ফলাফল দেখুন</a>
                        </li>
                        @if(Auth::is('student'))
                            <li>
                                <a href="{{url('/online-exam/result')}}">অনলাইন পরীক্ষার ফলাফল দেখুন</a>
                             </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin') || Auth::is('staff') || Auth::is('commitee') || Auth::is('teacher') || Auth::is('student'))
                <li class="@yield('active_routine')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>{{Auth::is('admin') ? 'রুটিন ব্যাবস্থাপনা' : 'রুটিন'}}<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('admin'))
                            <li>
                                <a href="{{url('/classRoutine/add')}}">ক্লাস রুটিন যোগ করুন</a>
                            </li>
                            <li>
                                <a href="{{url('/examRoutine/add')}}">পরীক্ষা রুটিন যোগ করুন</a>
                            </li>
                        @endif

                            <li>
                                <a href="{{url('/classRoutines')}}">ক্লাস রুটিন দেখুন</a>
                            </li>
                            <li>
                                <a href="{{url('/examRoutines')}}">পরীক্ষা রুটিন দেখুন</a>
                            </li>
                    </ul>
                </li>
            @endif


            @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('staff') || Auth::is('student'))
                <li class="@yield('active_notice')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>{{Auth::is('admin') ? 'নোটিশ ব্যাবস্থাপনা' : 'নোটিশ'}}<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/notice')}}">নোটিশ দেখুন</a>
                        </li>
                        @if(Auth::is('admin'))
                            <li>
                                <a href="{{url('/notice/create')}}">নোটিশ যোগ করুন</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('staff') || Auth::is('student'))
                <li class="@yield('leave_application')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>{{Auth::is('admin') ? 'ছুটির আবেদন ব্যাবস্থাপনা' : 'ছুটির আবেদন'}}<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(!Auth::is('admin'))
                            <li>
                                <a href="{{url('/leave_application')}}">ছুটির আবেদন তালিকা</a>
                            </li>
                            <li>
                                <a href="{{url('/leave_application/create')}}">ছুটির আবেদন যোগ করুন</a>
                            </li>
                        @endif
                        @if(Auth::is('admin'))
                            <li>
                                <a href="{{url('/leave_application/pending_list')}}">প্রক্রিয়াধীন ছুটির আবেদন</a>
                            </li>
                            <li>
                                <a href="{{url('/leave_application/accept_list')}}">গ্রহণ করা ছুটির আবেদন</a>
                            </li>
                            <li>
                                <a href="{{url('/leave_application/cancle_list')}}">বাতিল করা ছুটির আবেদন</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(Auth::is('admin') || Auth::is('teacher') || Auth::is('staff') || Auth::is('student'))
                <li class="@yield('active_counseling')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>{{'শিক্ষার্থী অভিযোগ'}}<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('student'))
                            <li>
                                <a href="{{route('complaint.add')}}">অভিযোগ করুন</a>
                            </li>
                            <li>
                                <a href="{{url('/complaint.list')}}">অভিযোগের তালিকা</a>
                            </li>
                        @endif
                        @if(Auth::is('admin'))
                            <li>
                                <a href="{{url('/leave_application/pending_list')}}">প্রক্রিয়াধীন ছুটির আবেদন</a>
                            </li>
                            <li>
                                <a href="{{url('/leave_application/accept_list')}}">গ্রহণ করা ছুটির আবেদন</a>
                            </li>
                            <li>
                                <a href="{{url('/leave_application/cancle_list')}}">বাতিল করা ছুটির আবেদন</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin')||Auth::is('root'))
                <li class="@yield('active_accounts')">
                    <a href="#">
                        <i class="fa fa-sitemap fa-2x"></i>
                        হিসাব ব্যাবস্থাপনা
                        <span class="fa arrow"></span>
                    </a>

                    <ul class="nav nav-second-level">
                      @if(Auth::is('root'))
                        <li>
                            <a href="{{ route('fee_category_add') }}"> ফি এর ক্যাটাগরি ব্যবস্থাপনা</a>
                        </li>

                        <li>
                            <a href="{{ route('fund_create') }}"> ফান্ড ব্যবস্থাপনা</a>
                        </li>
                      @endif
                      @if(Auth::is('admin'))
                        <li>
                            <a href="{{ route('account_dashboard') }}"> একাউন্ট ড্যাশবোর্ড </a>
                        </li>
                        <li>
                            <a href="{{ route('fee_sub_category_add') }}"> ফি এর সাব ক্যাটাগরি ব্যবস্থাপনা</a>
                        </li>
                        <li>
                            <a href="{{ route('fee_setup_add') }}"> ফি এর পরিমান নির্ধারণ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('fee_collection_add') }}"> ফি কালেকশন করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('fee_collection_manage') }}"> ফি কালেকশন পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('due_sms') }}"> সেন্ড বকেয়া এস,এম,এস </a>
                        </li>
                        <li>
                            <a href="{{ route('income_add') }}">আয় যোগ ও প্রিন্ট করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('income_manage') }}"> আয় পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('expense_add') }}"> খরচ যোগ ও প্রিন্ট করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('expense_manage') }}"> খরচ পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('fine_setup_add') }}"> জরিমানা নির্ধারণ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('fine_collection_add') }}"> জরিমানা কালেকশন করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('fine_collection_manage') }}"> জরিমানা পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('salary_setup_add') }}"> বেসিক বেতন ব্যবস্থাপনা </a>
                        </li>
                        <li>
                            <a href="{{ route('salary_fund_add') }}"> বেতন-ভাতা ব্যবস্থাপনা </a>
                        </li>
                        <li>
                            <a href="{{ route('provident_fund_add') }}"> প্রভিডেন্ট ফান্ড ব্যবস্থাপনা </a>
                        </li>
                        <li>
                            <a href="{{ route('bank_provident_fund_list') }}">ব্যাংকে জমা প্রভিডেন্ট ফান্ডের তালিকা </a>
                        </li>
                        <li>
                            <a href="{{ route('advanced_paid_add') }}"> অগ্রিম বেতন ব্যবস্থাপনা </a>
                        </li>
                        <li>
                            <a href="{{ route('salary_sheet_add') }}"> মাসিক বেতন শীট তৈরি ও প্রিন্ট </a>
                        </li>
                        <li>
                            <a href="{{ route('salary_sheet_search') }}"> মাসিক বেতন শীট পরিচালনা </a>
                        </li>
                        <li>
                            <a href="{{ route('asset_add') }}"> এসেট বা সম্পত্তি ব্যবস্থাপনা </a>
                        </li>
                        <li>
                            <a href="{{ route('bank_add') }}">ব্যাংক ব্যবস্থাপনা</a>
                        </li>
                        <li>
                            <a href="{{ route('bank_aacount_type_add') }}">ব্যাংক একাউন্টের ধরণ ব্যবস্থাপনা</a>
                        </li>
                        <li>
                            <a href="{{ route('bank_deposit_add') }}">ব্যাংকে ডিপোজিট ব্যবস্থাপনা</a>
                        </li>
                        <li>
                            <a href="{{ route('bank_withdraw_add') }}">ব্যাংক থেকে টাকা উত্তোলন</a>
                        </li>
                        <li>
                            <a href="{{ route('account_report') }}"> একাউন্ট রিপোর্ট</a>
                        </li>
                        <li>
                            <a href="{{ route('account_setting_add') }}"> একাউন্ট সেটিংস</a>
                        </li>
                      @endif
                    </ul>


                </li>
            @endif


            @if(Auth::is('root'))
            <li></li>
                <li class="@yield('active_card1')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>আইডি কার্ড তৈরি করুন <span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        @if(Auth::is('root'))
                        <!--
                        <li>
                        <a href="{{url('/studentCard')}}">শিক্ষার্থীর আইডি তৈরি করুন </a>
                        </li>
                        -->
                        <li>
                        <a href="{{url('/stafCard')}}">স্টাফ আইডি তৈরি করুন </a>
                        </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::is('admin'))
                <li class="@yield('active_latter')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>কাগজপত্র ব্যাবস্থাপনা <span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                         <a href="{{url('/result-list/index')}}">ফলাফলের তালিকা তৈরি করুন </a>
                        </li>
                        <li>
                         <a href="{{url('/attendance-list/create')}}">উপস্থিতির তালিকাপত্র তৈরি করুন </a>
                        </li>
                        <li>
                         <a href="{{url('/admit-card/create')}}">প্রবেশপত্র তৈরি করুন </a>
                        </li>
                        <li>
                         <a href="{{url('/exam-seat-plan/create')}}">পরীক্ষার আসন পরিকল্পনা তৈরি করুন </a>
                        </li>
                        <li>
                         <a href="{{url('/testimonial/create')}}">প্রশংসাপত্র তৈরি করুন </a>
                        </li>
                        <li>
                         <a href="{{url('/transfer_certificate/create')}}">ছাড়পত্র তৈরি করুন </a>
                        </li>
                        <li>
                         <a href="{{url('/important_form')}}">ডাউনলোড ফর্ম </a>
                        </li>
                    </ul>
                </li>
            @endif


            @if(Auth::is('root')||Auth::is('admin'))
                <li class="@yield('active_class1')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>সেটিংস অপশন<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('root'))
                        <li>
                            <a href="{{url('/class/create')}}">শ্রেণি তৈরি করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/class')}}">শ্রেণির তালিকা</a>
                        </li>

                        <li>
                            <a href="{{url('/group/create')}}">বিভাগ তৈরি করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/group')}}">বিভাগের তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/service-type')}}">সেবার ধরণ তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/important_file')}}">গুরুত্বপূর্ণ ফাইল</a>
                        </li>
                        @endif
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{url('/unit/create')}}">শাখা তৈরি করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/unit')}}">শাখার তালিকা</a>
                        </li>

                        <li>
                            <a href="{{url('/holiday/create')}}">ছুটি তৈরি করুন</a>
                        </li>
                        <li>
                            <a href="{{url('/holiday')}}">ছুটির তালিকা</a>
                        </li>

                        <li>
                            <a href="{{url('/important-settings')}}">গুরুত্বপূর্ণ সেটিংস</a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="@yield('active_care')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>কেয়ার<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if (Auth::is('root'))
                            <li>
                                <a href="{{ route('problem.root_problem') }}">সমস্যা পরিচালনা করুন</a>
                            </li>
                            <li>
                                <a href="{{ route('advice.root_advice') }}">পরামর্শ পরিচালনা করুন</a>
                            </li>
                        @endif
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{ route('problem.add') }}">সমস্যা বলুন</a>
                        </li>
                        <li>
                            <a href="{{ route('problem.list') }}">সমস্যা পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('advice.add') }}">পরামর্শ দিন</a>
                        </li>
                        <li>
                            <a href="{{ route('advice.list') }}">পরামর্শ পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('problem.list.website') }}">ওয়েবসাইটের সমস্যা পরিচালনা করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('advice.list.website') }}">ওয়েবসাইটের পরামর্শ পরিচালনা করুন</a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="@yield('active_visitor')">
                    <a href="#"><i class="fa fa-sitemap fa-2x"></i>ভিজিটর ব্যবস্থাপনা<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Auth::is('admin'))
                        <li>
                            <a href="{{ route('visitorType.add') }}">ভিজিটরের ধরণ</a>
                        </li>
                        <li>
                            <a href="{{ route('visitor.add') }}">ভিজিটর যোগ করুন</a>
                        </li>
                        <li>
                            <a href="{{ route('visitor.list') }}">ভিজিটর পরিচালনা করুন</a>
                        </li>
                        @endif
                    </ul>
                </li>

            @endif
            

            <!-- @if(Auth::is('admin'))
             <li>
                 <a href="{{url('qbank')}}"><i class="fa fa-sitemap fa-2x"></i>প্রশ্নপত্র সংরক্ষণ</a>
             </li>
            @endif -->
            @if(Auth::is('root'))
                <li class="@yield('active_card1')">
                    <a href="#">
                        <i class="fa fa-sitemap fa-2x"></i>বিজ্ঞাপন ব্যাবস্থাপনা <span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                        <a href="{{url('/advertisement')}}">বিজ্ঞাপন </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(Auth::is('root'))
                <li class="@yield('date_language')">
                    <a href="#">
                        <i class="fa fa-sitemap fa-2x"></i>ওয়েব ম্যানেজমেন্ট <span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/admin_date_language/create')}}">তারিখের ভাষা যোগ করুন</a>
                        </li>
                         <li>
                            <a href="{{url('/admin_date_language')}}">তারিখের ভাষা </a>
                        </li>
                        <li>
                            <a href="{{url('/important_links_category_root/create')}}">গুরুত্বপূর্ণ লিঙ্ক ক্যাটাগরি যোগ করুন</a>
                        </li>
                         <li>
                            <a href="{{url('/important_links_category_root')}}">গুরুত্বপূর্ণ লিঙ্ক ক্যাটাগরি তালিকা </a>
                        </li>
                        <li>
                            <a href="{{url('/important_link_root/create')}}">গুরুত্বপূর্ণ লিঙ্ক যোগ করুন</a>
                        </li>
                         <li>
                            <a href="{{url('/important_link_root')}}">গুরুত্বপূর্ণ লিঙ্কের তালিকা</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(Auth::is('root') || Auth::is('teacher') || Auth::is('staff') || Auth::is('student'))
            <li>
                <a href="{{url('chat')}}" ><i class="fa fa-comment fa-2x"></i>ইহসান চ্যাটিং অ্যাপ্লিকেশন</a>

            </li>
            @endif
            <li class="@yield('post')">
                    <a href="#">
                        <i class="fa fa-sitemap fa-2x"></i>ইহ্‌সান এডুকেশন সোশাল সাইট  <span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/post/')}}">টাইম লাইন</a>
                        </li>
                        <li>
                            <a href="{{url('/post/profile',1)}}">প্রফাইল</a>
                        </li>
                        @if(Auth::is('root') || Auth::is('admin'))
                        <li>
                            <a href="{{url('/post/pending_list')}}">পেন্ডিং তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/post/accept_list')}}">একসেপ্ট তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/post/cancel_list')}}">বাতিল তালিকা</a>
                        </li>
                        <li>
                            <a href="{{url('/post/delete_list')}}">ডিলেটেড তালিকা</a>
                        </li>
                        @endif
                         
                    </ul>
                </li>
                @if(Auth::is('admin'))
                <li>
                    <a href="{{url('school_settings')}}"><i class="fa fa-angle-double-down fa-2x"></i>ওয়েব ম্যানেজমেন্ট</a>

                </li>
            @endif

        </ul>

    </div>

</nav>
