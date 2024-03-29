@extends($activeTemplate.'layouts.frontend')
@section('content')

    <div class="center-section">
        <div class="content-section">
            <h3 class="title"><span class="f-1"></span>@lang('About Us')<span class="f-2"></span></h3>
            <p>{{ __(@$about->data_values->title) }}</p>
            <p>{{ __(@$about->data_values->content) }}</p>
        </div>
        <div class="content-section">
            <h3 class="title"><span class="f-1"></span>@lang('Our Services')<span class="f-2"></span></h3>
            <div class="d-flex justify-content-around our-services">
                @foreach($services  as $service)
                    <img src="{{$service->data_values->icon}}" alt="">
                @endforeach
            </div>
            <div class="d-flex justify-content-around mt-2">
                @foreach($services  as $service)
                    <span>{{$service->data_values->title}}</span>
                @endforeach
            </div>
        </div>
    </div>
    {{--    @php--}}
    {{--        $hero_content = getContent('hero.content', true);--}}
    {{--    @endphp--}}
    {{--    <!-- banner-section start -->--}}
    {{--    <section class="banner-section">--}}
    {{--        <div class="banner-element">--}}
    {{--            <img src="{{ getImage('assets/images/frontend/hero/' . @$hero_content->data_values->image, '633x539') }}" alt="banner">--}}
    {{--        </div>--}}
    {{--        <div class="banner-shape-one">--}}
    {{--            <img src="{{asset($activeTemplateTrue.'images/banner/icon-1.png')}}" alt="shape">--}}
    {{--        </div>--}}
    {{--        <div class="banner-shape-two">--}}
    {{--            <img src="{{asset($activeTemplateTrue.'images/banner/icon-2.png')}}" alt="shape">--}}
    {{--        </div>--}}
    {{--        <div class="banner-shape-three">--}}
    {{--            <img src="{{asset($activeTemplateTrue.'images/banner/icon-3.png')}}" alt="shape">--}}
    {{--        </div>--}}
    {{--        <div class="container">--}}
    {{--            <figure class="figure highlight-background highlight-background--lean-right">--}}
    {{--                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1291px" height="480px">--}}
    {{--                    <defs>--}}
    {{--                        <linearGradient id="PSgrad_0" x1="0%" x2="0%" y1="100%" y2="0%">--}}
    {{--                            <stop offset="28%" stop-color="rgb(244,245,250)" stop-opacity="1" />--}}
    {{--                            <stop offset="100%" stop-color="rgb(252,253,255)" stop-opacity="1" />--}}
    {{--                        </linearGradient>--}}

    {{--                    </defs>--}}
    {{--                    <path fill-rule="evenodd" opacity="0.1" fill="rgb(0, 0, 0)" d="M480.084,0.001 L1290.991,0.001 L810.906,831.000 L-0.000,831.000 L480.084,0.001 Z" />--}}
    {{--                    <path fill="url(#PSgrad_0)" d="M480.084,0.001 L1290.991,0.001 L810.906,831.000 L-0.000,831.000 L480.084,0.001 Z" />--}}
    {{--                </svg>--}}
    {{--            </figure>--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-lg-7">--}}
    {{--                    <div class="banner-content">--}}
    {{--                        <h2 class="title">@lang('Tracking order')</h2>--}}
    {{--                        <form class="register-form" method="post" action="{{route('query')}}">--}}
    {{--                            @csrf--}}
    {{--                            <div class="row justify-content-center ml-b-20">--}}
    {{--                                <div class="col-lg-6 form-group">--}}
    {{--                                    <input name="item_id" type="text" placeholder="@lang('Item Number')">--}}
    {{--                                </div>--}}
    {{--                                <div class="col-lg-12 form-group text-center">--}}
    {{--                                    <button type="submit" class="submit-btn">@lang('Query')</button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- banner-section end -->--}}

    {{--    @if($sections->secs != null)--}}
    {{--        @foreach(json_decode($sections->secs) as $sec)--}}
    {{--            @include($activeTemplate.'sections.'.$sec)--}}
    {{--        @endforeach--}}
    {{--    @endif--}}
@endsection
