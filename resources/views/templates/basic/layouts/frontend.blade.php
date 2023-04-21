<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset($activeTemplateTrue.'images/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    @include('partials.seo')<!-- fontawesome css link -->--}}
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/plugins.css')}}">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'/css/bootstrap.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&family=Amiri:ital@1&family=Caveat:wght@700&family=Courgette&family=Dancing+Script:wght@700&family=Inter:wght@200&family=Playfair+Display&family=Tajawal&family=Tinos&display=swap"
        rel="stylesheet">
    {{--    <link rel="stylesheet"--}}
    {{--          href="{{asset($activeTemplateTrue.'css/color.php?color='.$general->base_color.'&secondColor='.$general->secondary_color)}}">--}}

</head>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Preloader
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="overlayer">
    <div class="loader">
        <div class="loader-inner"></div>
    </div>
</div>
<body @if(session('lang') != 'ar') id="body" @endif>
<div class="water"></div>
<div class="overlay"></div>
<div class="video">
    <video autoplay loop muted>
        <source src="{{asset($activeTemplateTrue.'media/Pinterest-1.mp4')}}" type="video/mp4">
    </video>
</div>
<header>
    <div class="row">
        <div class="head-left">
            <div class="login"><img src="{{asset($activeTemplateTrue.'images/log-in.png')}}" alt="log-in"> login</div>
            <div class="logo"><img src="{{asset($activeTemplateTrue.'images/logo.png')}}" alt="logo"> White Sea For
                Shipping Services
            </div>
        </div>
        <div class="head-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="1024" height="1024" viewBox="0 0 1024 1024">
                <path fill="rgba(255, 255, 255, 0.8)"
                      d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="rgba(255, 255, 255, 0.8)"
                      d="M20.936 7.564a6.06 6.06 0 0 0-.377-2.039a3.4 3.4 0 0 0-.821-1.263a3.398 3.398 0 0 0-1.263-.82a6.094 6.094 0 0 0-2.039-.378C15.278 3.012 14.931 3 12 3c-2.93 0-3.279.01-4.436.064a6.06 6.06 0 0 0-2.039.377a3.39 3.39 0 0 0-1.263.821a3.425 3.425 0 0 0-.82 1.264a6.096 6.096 0 0 0-.378 2.038C3.012 8.723 3 9.07 3 12.001s.01 3.279.064 4.436a6.06 6.06 0 0 0 .378 2.039c.175.476.456.908.821 1.261a3.41 3.41 0 0 0 1.263.822c.652.242 1.342.37 2.038.377C8.721 20.99 9.07 21 12 21s3.28-.01 4.436-.064a6.059 6.059 0 0 0 2.039-.377a3.635 3.635 0 0 0 2.084-2.083a6.09 6.09 0 0 0 .377-2.04C20.99 15.28 21 14.932 21 12s-.01-3.278-.064-4.436z"
                      opacity=".5"/>
                <path fill="rgba(255, 255, 255, 0.8)"
                      d="M17.793 7.618a2.459 2.459 0 0 0-1.41-1.41a4.132 4.132 0 0 0-1.38-.256c-.784-.036-1.02-.044-3.003-.044s-2.218.008-3 .044a4.1 4.1 0 0 0-1.38.255c-.649.25-1.16.762-1.41 1.41c-.164.443-.25.91-.256 1.38c-.036.784-.043 1.019-.043 3.003s.007 2.22.043 3.003c.005.471.092.938.255 1.38a2.46 2.46 0 0 0 1.41 1.41c.443.163.91.25 1.38.255c.783.036 1.018.043 3.002.043s2.22-.007 3.003-.043a4.104 4.104 0 0 0 1.38-.256a2.46 2.46 0 0 0 1.41-1.41c.164-.441.25-.908.256-1.38c.036-.783.043-1.018.043-3.002s-.007-2.219-.043-3.002a4.103 4.103 0 0 0-.256-1.38zM12 15.815a3.815 3.815 0 1 1 0-7.63a3.815 3.815 0 0 1 0 7.63zm3.966-6.89a.892.892 0 0 1 0-1.783h.001a.892.892 0 0 1 .005 1.783h-.006z"/>
                <path fill="rgba(255, 255, 255, 0.8)"
                      d="M12 9.523A2.477 2.477 0 1 0 14.477 12a2.477 2.477 0 0 0-2.476-2.477z"/>
                <path fill="rgba(255, 255, 255, 0.8)"
                      d="M21.93 7.07a6.734 6.734 0 0 0-.42-2.264a3.779 3.779 0 0 0-.913-1.403a3.776 3.776 0 0 0-1.403-.913a6.771 6.771 0 0 0-2.265-.42C15.642 2.014 15.257 2 12 2c-3.255 0-3.642.012-4.928.07a6.76 6.76 0 0 0-2.265.42a3.76 3.76 0 0 0-1.403.913a3.806 3.806 0 0 0-.913 1.403a6.773 6.773 0 0 0-.42 2.265C2.014 8.358 2 8.744 2 12.001s.012 3.643.071 4.929c.01.773.151 1.54.42 2.265c.195.53.507 1.01.912 1.402a3.79 3.79 0 0 0 1.403.913a6.732 6.732 0 0 0 2.265.42c1.286.059 1.673.07 4.929.07c3.257 0 3.643-.012 4.93-.07a6.732 6.732 0 0 0 2.264-.42a4.04 4.04 0 0 0 2.316-2.315c.268-.726.41-1.492.42-2.265c.058-1.287.07-1.674.07-4.93c0-3.257-.012-3.642-.07-4.93zm-2.545 7.993a5.435 5.435 0 0 1-.345 1.804a3.8 3.8 0 0 1-2.173 2.173a5.45 5.45 0 0 1-1.803.345c-.793.037-1.046.045-3.064.045s-2.27-.009-3.063-.045a5.453 5.453 0 0 1-1.803-.345a3.799 3.799 0 0 1-2.174-2.173a5.45 5.45 0 0 1-.345-1.804C4.58 14.271 4.57 14.018 4.57 12s.009-2.271.045-3.063a5.45 5.45 0 0 1 .345-1.804A3.798 3.798 0 0 1 7.134 4.96a5.45 5.45 0 0 1 1.803-.345c.793-.037 1.047-.045 3.064-.045s2.27.009 3.063.045a5.442 5.442 0 0 1 1.804.345a3.8 3.8 0 0 1 2.172 2.173c.217.578.333 1.187.345 1.804c.036.792.045 1.045.045 3.063s-.009 2.27-.045 3.063z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="rgba(255, 255, 255, 0.8)"
                      d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/>
            </svg>
        </div>
    </div>
</header>

<!-- ******************* for Lg screen ******************* -->
<main class="main-des">
    <div class="side-bar">
        <ul>
            <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
            {{--            <li><a href="">@lang('Services')</a></li>--}}
            <li><a href="{{ route('query') }}">@lang('Tracking order')</a></li>
            {{--            <li><a href="{{route()}}">@lang('Order Tracking')</a></li>--}}
            <li><a href="{{ route('contact') }}">@lang('Contact') </a></li>
            <li><a href="">@lang('About Us')</a></li>
        </ul>
    </div>
    @yield('content')
    <div class="fin-bar">
        <nav>
            <input id="toggle" type="checkbox" checked>
            <h2>{{ session('lang') == 'ar' ? 'العربية' : 'English'}}</h2>
            <ul>
                @foreach($language as $item)
                    <li><a href="{{route('lang',$item->code)}}">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</main>

<!-- ******************* for Mobile screen ******************* -->
<main class="main-mob">
    <div class="d-flex justify-content-between">
        <div class="side-bar">
            <ul>
                {{--                <li>--}}
                {{--                    <img class="m-1" src="{{asset($activeTemplateTrue.'images/log-in.png')}}" alt="">--}}
                {{--                    @lang('login')--}}
                {{--                </li>--}}
                <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
            </ul>
        </div>
        <div class="fin-bar">
            <nav>
                <input id="toggle" type="checkbox" checked>
                <input id="toggle" type="checkbox" checked>
                <h2>{{ session('lang') == 'ar' ? 'العربية' : 'English'}}</h2>
                <ul>
                    @foreach($language as $item)
                        <li><a href="{{route('lang',$item->code)}}">{{$item->name}}</a></li>
                    @endforeach
                    {{--                <li><a href="index-ar.html">العربية</a></li>--}}
                </ul>
            </nav>
        </div>
    </div>
    @yield('content')

    <div class="side-bar">
        <li><a href="{{ route('query') }}">@lang('Tracking order')</a></li>
    </div>
    <div class="social">
        <svg xmlns="http://www.w3.org/2000/svg" width="1024" height="1024" viewBox="0 0 1024 1024">
            <path fill="rgba(255, 255, 255, 0.8)"
                  d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="rgba(255, 255, 255, 0.8)"
                  d="M20.936 7.564a6.06 6.06 0 0 0-.377-2.039a3.4 3.4 0 0 0-.821-1.263a3.398 3.398 0 0 0-1.263-.82a6.094 6.094 0 0 0-2.039-.378C15.278 3.012 14.931 3 12 3c-2.93 0-3.279.01-4.436.064a6.06 6.06 0 0 0-2.039.377a3.39 3.39 0 0 0-1.263.821a3.425 3.425 0 0 0-.82 1.264a6.096 6.096 0 0 0-.378 2.038C3.012 8.723 3 9.07 3 12.001s.01 3.279.064 4.436a6.06 6.06 0 0 0 .378 2.039c.175.476.456.908.821 1.261a3.41 3.41 0 0 0 1.263.822c.652.242 1.342.37 2.038.377C8.721 20.99 9.07 21 12 21s3.28-.01 4.436-.064a6.059 6.059 0 0 0 2.039-.377a3.635 3.635 0 0 0 2.084-2.083a6.09 6.09 0 0 0 .377-2.04C20.99 15.28 21 14.932 21 12s-.01-3.278-.064-4.436z"
                  opacity=".5"/>
            <path fill="rgba(255, 255, 255, 0.8)"
                  d="M17.793 7.618a2.459 2.459 0 0 0-1.41-1.41a4.132 4.132 0 0 0-1.38-.256c-.784-.036-1.02-.044-3.003-.044s-2.218.008-3 .044a4.1 4.1 0 0 0-1.38.255c-.649.25-1.16.762-1.41 1.41c-.164.443-.25.91-.256 1.38c-.036.784-.043 1.019-.043 3.003s.007 2.22.043 3.003c.005.471.092.938.255 1.38a2.46 2.46 0 0 0 1.41 1.41c.443.163.91.25 1.38.255c.783.036 1.018.043 3.002.043s2.22-.007 3.003-.043a4.104 4.104 0 0 0 1.38-.256a2.46 2.46 0 0 0 1.41-1.41c.164-.441.25-.908.256-1.38c.036-.783.043-1.018.043-3.002s-.007-2.219-.043-3.002a4.103 4.103 0 0 0-.256-1.38zM12 15.815a3.815 3.815 0 1 1 0-7.63a3.815 3.815 0 0 1 0 7.63zm3.966-6.89a.892.892 0 0 1 0-1.783h.001a.892.892 0 0 1 .005 1.783h-.006z"/>
            <path fill="rgba(255, 255, 255, 0.8)"
                  d="M12 9.523A2.477 2.477 0 1 0 14.477 12a2.477 2.477 0 0 0-2.476-2.477z"/>
            <path fill="rgba(255, 255, 255, 0.8)"
                  d="M21.93 7.07a6.734 6.734 0 0 0-.42-2.264a3.779 3.779 0 0 0-.913-1.403a3.776 3.776 0 0 0-1.403-.913a6.771 6.771 0 0 0-2.265-.42C15.642 2.014 15.257 2 12 2c-3.255 0-3.642.012-4.928.07a6.76 6.76 0 0 0-2.265.42a3.76 3.76 0 0 0-1.403.913a3.806 3.806 0 0 0-.913 1.403a6.773 6.773 0 0 0-.42 2.265C2.014 8.358 2 8.744 2 12.001s.012 3.643.071 4.929c.01.773.151 1.54.42 2.265c.195.53.507 1.01.912 1.402a3.79 3.79 0 0 0 1.403.913a6.732 6.732 0 0 0 2.265.42c1.286.059 1.673.07 4.929.07c3.257 0 3.643-.012 4.93-.07a6.732 6.732 0 0 0 2.264-.42a4.04 4.04 0 0 0 2.316-2.315c.268-.726.41-1.492.42-2.265c.058-1.287.07-1.674.07-4.93c0-3.257-.012-3.642-.07-4.93zm-2.545 7.993a5.435 5.435 0 0 1-.345 1.804a3.8 3.8 0 0 1-2.173 2.173a5.45 5.45 0 0 1-1.803.345c-.793.037-1.046.045-3.064.045s-2.27-.009-3.063-.045a5.453 5.453 0 0 1-1.803-.345a3.799 3.799 0 0 1-2.174-2.173a5.45 5.45 0 0 1-.345-1.804C4.58 14.271 4.57 14.018 4.57 12s.009-2.271.045-3.063a5.45 5.45 0 0 1 .345-1.804A3.798 3.798 0 0 1 7.134 4.96a5.45 5.45 0 0 1 1.803-.345c.793-.037 1.047-.045 3.064-.045s2.27.009 3.063.045a5.442 5.442 0 0 1 1.804.345a3.8 3.8 0 0 1 2.172 2.173c.217.578.333 1.187.345 1.804c.036.792.045 1.045.045 3.063s-.009 2.27-.045 3.063z"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="rgba(255, 255, 255, 0.8)"
                  d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/>
        </svg>
    </div>
</main>
<script src="{{asset($activeTemplateTrue.'js/jquery.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/popper.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/plugins.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/scripts.js')}}"></script>
</body>
</html>
{{--<!-- header-section start -->--}}
{{--<header class="header-section">--}}
{{--    <div class="header">--}}
{{--        <div class="header-bottom-area">--}}
{{--            <div class="container">--}}
{{--                <div class="header-menu-content">--}}
{{--                    <nav class="navbar navbar-expand-lg p-0" >--}}
{{--                        <a class="site-logo site-title" href="{{route('home')}}"><img src="{{ getImage(imagePath()['logoIcon']['path'] .'/logo.png') }}" height="34px" alt="site-logo"></a>--}}
{{--                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                            <span class="fas fa-bars"></span>--}}
{{--                        </button>--}}
{{--                        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                            <ul class="navbar-nav main-menu ml-auto">--}}
{{--                                <li><a href="{{route('home')}}">{{__('Home')}}</a></li>--}}

{{--                                @foreach($pages as $k => $data)--}}
{{--                                    <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>--}}
{{--                                @endforeach--}}

{{--                                <li><a href="{{ route('contact') }}">@lang('Contact')</a></li>--}}

{{--                                <li class="menu_has_children">--}}
{{--                                    <a href="#0">@lang('Account')</a>--}}
{{--                                    <ul class="sub-menu">--}}
{{--                                        @auth--}}
{{--                                            <li><a href="{{ route('user.home') }}">@lang('Dashboard')</a></li>--}}
{{--                                            <li><a href="{{ route('user.logout') }}">@lang('Logout')</a></li>--}}
{{--                                        @else--}}
{{--                                            <li><a href="{{ route('user.login') }}">@lang('Login')</a></li>--}}
{{--                                            <li><a href="{{ route('user.register') }}">@lang('Register')</a></li>--}}
{{--                                        @endauth--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <select class="select w-auto ml-xl-3 langSel" style="background: transparent;color: white;height: 10px;border: 1px solid #e5e5e575;">--}}
{{--                                    @foreach($language as $item)--}}
{{--                                        <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif class="mr-0">{{ __($item->name) }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
{{--<!-- header-section end -->--}}

{{--<a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>--}}

{{--<!--breadcrumb area-->--}}
{{--@if(request()->route()->getName() != 'home')--}}
{{--    @include($activeTemplate.'partials.breadcrumb')--}}
{{--@endif--}}
{{--<!--/breadcrumb area-->--}}


{{--@yield('content')--}}


{{--@php--}}
{{--    $footer_content = getContent('footer.content', true);--}}
{{--    $footer_elements = getContent('footer.element');--}}
{{--    $address_content = getContent('address.content', true);--}}
{{--    $extra_pages = getContent('extra.element');--}}
{{--@endphp--}}
{{--<!-- footer-section start -->--}}
{{--<footer class="footer-section ptb-80">--}}
{{--    <div class="container">--}}
{{--        <div class="footer-area mrt-100">--}}
{{--            <div class="row ml-b-30">--}}
{{--                <div class="col-lg-4 col-sm-8 mrb-30">--}}
{{--                    <div class="footer-widget widget-menu">--}}
{{--                        <div class="footer-logo">--}}
{{--                            <h3 class="widget-title">@lang('About Us')</h3>--}}
{{--                            <p>{{ __(@$footer_content->data_values->content) }}</p>--}}
{{--                            <div class="social-area">--}}
{{--                                <ul class="footer-social">--}}
{{--                                    @forelse($footer_elements as $item)--}}
{{--                                        <li><a href="{{ @$item->data_values->social_url }}">@php echo @$item->data_values->social_icon @endphp</a></li>--}}
{{--                                    @empty--}}
{{--                                    @endforelse--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-sm-6 mrb-30">--}}
{{--                    <div class="footer-widget">--}}
{{--                        <h3 class="widget-title">@lang('Quick Link')</h3>--}}
{{--                        <ul>--}}
{{--                            @foreach($pages as $k => $data)--}}
{{--                                <li><a href="{{route('pages',[$data->slug])}}">{{__($data->name)}}</a></li>--}}
{{--                            @endforeach--}}

{{--                            <li><a href="{{ route('contact') }}">@lang('Contact')</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-sm-6 mrb-30">--}}
{{--                    <div class="footer-widget">--}}
{{--                        <h3 class="widget-title">@lang('Privacy and Terms')</h3>--}}
{{--                        <ul>--}}
{{--                            @forelse($extra_pages as $item)--}}
{{--                                <li><a href="{{ route('extra.details', [$item->id, slug($item->data_values->title)]) }}">{{ __(@$item->data_values->title) }}</a></li>--}}
{{--                            @empty--}}
{{--                            @endforelse--}}

{{--                            <li><a href="{{ route('api.documentation') }}">@lang('API Documentation')</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-sm-6 mrb-30">--}}
{{--                    <div class="footer-widget widget-menu">--}}
{{--                        <h3 class="widget-title">@lang('contact info')</h3>--}}
{{--                        <ul class="footer-contact-list">--}}
{{--                            <li>{{ __(@$address_content->data_values->address) }}</li>--}}
{{--                            <li>@lang('Call Us Now') {{ __(@$address_content->data_values->phone) }}</li>--}}
{{--                            <li>{{ __(@$address_content->data_values->email) }}</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
{{--<div class="privacy-area privacy-area--style">--}}
{{--    <div class="container">--}}
{{--        <div class="copyright-area d-flex flex-wrap align-items-center justify-content-center">--}}
{{--            <div class="copyright">--}}
{{--                <p>@lang('Copyright') © {{ date('Y') }} @lang('All Rights reserved')</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- footer-section end -->--}}


{{--<!-- Optional JavaScript -->--}}
{{--<!-- jQuery first, then Popper.js, then Bootstrap JS -->--}}
{{--<!-- jquery -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/jquery-3.6.0.min.js')}}"></script>--}}
{{--<!-- migarate-jquery -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/jquery-migrate-3.0.0.js')}}"></script>--}}
{{--<!-- bootstrap js -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>--}}
{{--<!-- magnific-popup js -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/jquery.magnific-popup.js')}}"></script>--}}
{{--<!-- nice-select js-->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/jquery.nice-select.js')}}"></script>--}}
{{--<!-- swipper js -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/swiper.min.js')}}"></script>--}}
{{--<!--plugin js-->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/plugin.js')}}"></script>--}}
{{--<!--chart js-->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/chart.js')}}"></script>--}}
{{--<!-- viewport js -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/viewport.jquery.js')}}"></script>--}}
{{--<!-- odometer js -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/odometer.min.js')}}"></script>--}}
{{--<!-- wow js file -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/wow.min.js')}}"></script>--}}
{{--<!-- main -->--}}
{{--<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>--}}


{{--@stack('script-lib')--}}

{{--@stack('script')--}}

{{--@include('partials.plugins')--}}

{{--@include('admin.partials.notify')--}}


{{--<script>--}}
{{--    (function ($) {--}}
{{--        "use strict";--}}
{{--        $(document).on("change", ".langSel", function() {--}}
{{--            window.location.href = "{{url('/')}}/change/"+$(this).val() ;--}}
{{--        });--}}
{{--    })(jQuery);--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}
