@extends('admin.layouts.app')
@push('style')
    <style>


        .continer {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-size: 20px;
        }

        .main,
        .sender,
        .reciever,
        .contain,
        .conditions {
            border: 3px solid #476199;
            border-radius: 30px;
            margin-bottom: 10px;
        }

        /*بداية صورة الخلفية  */
        .BGD {
            width: 100%;
            height: 50%;
        }

        .BGD img {
            position: absolute;
            top: 50px;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.06;
            left:0;

        }

        /*نهاية صورة الخلفية  */

        /* بطاقة المعلومات */
        .ticket {
            width: 90%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: row;
        }

        .ticket .name {
            white-space: nowrap;
            padding: 15px;
            margin-left: 20px;
            color: #646464;
        }

        .ticket input {
            width: 100%;
            background: transparent;
            outline: 0;
            border: 0px;
            border-bottom: 1px dashed #646464;
            margin-top: -12px;
            font-weight: bold;
        }

        .ticket input:focus {
            border-image: linear-gradient(to right, #5c9f69, #4560a6);
            border-image-slice: 1;
        }

        /* Start main البطاقة الرئيسية */
        .main {
            display: flex;
            margin-top: 10px;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
        }

        .main img {
            width: 100%;
        }

        /* End main البطاقة الرئيسية */

        /* Start Sender محتويات المرسل  */
        .sender {
            direction: rtl;
            display: flex;
            flex-direction: column;
        }

        /* Start reciever محتويات المستقبل  */
        .reciever {
            direction: rtl;
        }

        /* Start Contain محتويات الامانة */
        .contain {
            direction: rtl;
        }

        .title {
            text-align: center;
            font-weight: bold;
            padding: 2px;
            color: #646464;
        }

        .threeDivs {
            display: flex;
            flex-direction: row;
            margin-bottom: 10px;
        }

        .contain .ticket {
            height: 35px;
        }

        .part1 {
            width: 50%;
            margin-right: 10px;
            margin-left: -10px;
        }

        .part2 {
            width: 50%;
        }

        .line {
            position: relative;
            top: 7px;
            width: 1px;
            height: 87px;
            background-color: #646464;
        }

        /* End Contain */

        /* Start information معلومات التحويل  */
        .information {
            height: 80px;
            border-radius: 10px;
            margin-bottom: 10px;
            direction: rtl;
        }

        .infoCont {
            width: 100%;
            height: 100%;
            display: flex;
        }

        .infoBox {
            height: 100%;
            margin-left: 5px;
            display: flex;
            border: 3px solid #476199;
            border-radius: 30px;
        }

        /* Cost التكلفة  */
        .cost {
            width: 50%;
        }

        /* packages عدد الطرود  */
        .packages {
            width: 25%;
        }

        .packages .ticket {
            flex-direction: row;
        }

        /* weight الوزن  */
        .weight {
            width: 25%;
        }

        .weight .ticket {
            flex-direction: row;
        }

        .weight input,
        .packages input {
            margin-right: 10px;
            text-align-last: center;
        }

        .weight .ticket .name,
        .packages .ticket .name {
            margin-left: 0;
        }

        /* End information معلومات التحويل  */

        /* Start conditions الشروط */
        .conditions {
            height: 100%;
            border: 3px solid #476199;
            direction: rtl;
        }

        .conditions .title {
            color: #476199;
        }

        .conds {
            margin-right: 20px;
            direction: rtl;
            text-align: justify;
        }

        .conds ul li {
            margin-bottom: 1px;
            list-style: none;
            font-size: 18px;
            color: #646464;
            font-weight: bold;
        }

        .conds ul li::before {
            content: "•";
            color: #5c9f69;
            display: inline-block;
            width: 1em;
        }

        /* End conditions الشروط */

        @media screen and (max-width: 760px) {
            .BGD img {
                top: 100px;
                height: 50%;
            }
        }
    </style>
@endpush


@section('panel')
    <div class="row" id="printModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="col-md-3 rc"></div>
        <div class="col-md-6 item-body">
            <div class="continer" >
                <!-- صورة الخلفية -->
                <div class="BGD">
                    <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="" width="100%"/>
                </div>

                <!-- البطاقة الرئيسية -->
                <div class="main">
                    <div>
                        <img src="{{asset('assets/images/itemheader.png')}}" alt=""/>
                    </div>
                </div>

                <!-- Start Sender محتويات المرسل  -->
                <div class="sender">
                    <div class="ticket">
                        <div class="name">اسم المرسل</div>
                        <input type="text" name="sender" value="{{$item->sender_name}}"/>
                    </div>
                    <div class="ticket">
                        <div class="name">رقم المرسل</div>
                        <input type="text" value="{{$item->sender_phone}}"/>
                    </div>
                </div>
                <!-- End Sender محتويات المرسل  -->

                <!-- Start reciever محتويات المستقبل  -->
                <div class="reciever">
                    <div class="ticket">
                        <div class="name">اسم المستلم</div>
                        <input type="text" value="{{$item->recipient_name}}"/>
                    </div>
                    <div class="ticket">
                        <div class="name">رقم المستلم</div>
                        <input type="text" value="{{$item->recipient_phone}}"/>
                    </div>
                    <div class="ticket">
                        <div class="name" style="padding-left: 43px">الوجهة</div>
                        <input type="text" value="{{$item->destination}}"/>
                    </div>
                </div>
                <!-- End reciever محتويات المستقبل  -->

                <!-- Start Contain محتويات الامانة  -->
                <div class="contain">
                    <div class="title">محتويات الأمانة</div>
                    <div class="threeDivs">
                        <div class="part1">
                        @for($i=1;$i<=5;$i++)
                                <div class="ticket">
                                    <div class="name">{{$i}}</div>
                                    <input type="text" value="{{@$contents[$i]}}"/>
                                </div>
                        @endfor
                        </div>
                    <!-- العمود الفاصل -->
                        <div class="line"></div>
                        <!-- القسم الثاني من 6 الى 10 -->
                        <div class="part2">
                        @for($i=6;$i<=10;$i++)
                                <div class="ticket">
                                    <div class="name">{{$i}}</div>
                                    <input type="text" value="{{@$contents[$i] }}"/>
                                </div>
                        @endfor
                        </div>
                    </div>
                </div>
                <!-- End Contain محتويات الامانة  -->

                <!-- Start information معلومات التحويل -->
                <div class="information">
                    <!-- Cost التكلفة -->
                    <div class="infoCont">
                        <div class="cost infoBox">
                            <div class="ticket">
                                <div class="name" style="padding-left: 1px">التكلفة</div>
                                <input type="text" value="{{$item->cost}}"/>
                            </div>
                        </div>
                        <!-- packages عدد الطرود -->
                        <div class="packages infoBox">
                            <div class="ticket">
                                <div class="name" style="padding-left: 1px">عدد الطرود</div>
                                <input type="text" value="{{$item->packages_number}}"/>
                            </div>
                        </div>
                        <!-- weight الوزن -->
                        <div class="weight infoBox">
                            <div class="ticket">
                                <div class="name" style="padding-left: 1px">الوزن</div>
                                <input type="text" value="{{$item->weight}}  كيلو غرام"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End information معلومات التحويل -->

                <!-- Start conditions شروط التحويل  -->
                <div class="conditions box">
                    <div class="title">شروط الشحن</div>
                    <div class="conds">
                        <ul>
                            <li>لا تسلم الأمانة قبل دفع قيمة الشحن</li>
                            <li>الشركة غير مسؤولة عن الشحن بعد الاستلام من مكتب التسليم</li>
                            <li>تقع المسؤلية القانونية والجمركية على عاتق المرسل والمستلم</li>
                            <li>
                                لا يحق للمرسل والمستلم المطالبة بالشحن بعد مضي ثلاثة اشهر من
                                الارسال
                            </li>
                            <li>تختص محاكم دولة قطر في فض اي نزاع بين الطرفين</li>
                            <li>
                                الشركة ومكتب التسليم غير مسؤولين عن اتلاف المواد من قبل الجهات
                                المختصة
                            </li>
                            <li>
                                لا تتحمل الشركة الشاحنة اي مسؤولية ناتجة عن تلف او فقدان او مصادرة
                                المواد المنقولة
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 lc"></div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" href="{{ url()->previous() }}"><i
                class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>

    <a class="btn btn-sm btn--primary box--shadow1  text-white print"><i
                class="fa fa-fw fa-print"></i> @lang('Print')</a>
@endpush

@push('script')
    <script>

        (function ($) {
            "use strict";
            $('.print').on('click', function () {
                $(".rc").addClass('col-md-1').removeClass('col-md-3');
                $(".lc").addClass('col-md-1').removeClass('col-md-3');
                $(".navbar-wrapper").hide();
                $(".justify-content-between").hide();
                $(".item-body").addClass('col-md-10 align-items-center').removeClass('col-md-6');
                window.print();
                $(".rc").addClass('col-md-3').removeClass('col-md-1');
                $(".lc").addClass('col-md-3').removeClass('col-md-1');
                $(".navbar-wrapper").show();
                $(".justify-content-between").show();
                $(".item-body").addClass('col-md-6').removeClass('col-md-10 align-items-center');
                return false;
            });
        })(jQuery);
        // $('.print.printPage').click(function(){
        //     window.print();
        //     return false;
        // });
    </script>
@endpush