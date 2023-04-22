@extends($activeTemplate.'layouts.frontend')

@section('content')

    <div class="center-section order-tracking">
        <form class="content-section" method="post" action="{{route('query')}}">
            @csrf
            <h3 class="title">
                <span class="f-1"></span>@lang('Order Tracking') <span class="f-2"></span></h3>
            <p>@lang('Enter the item number')</p>
            <input type="text" name="item_id" placeholder="@lang('Item Number')" required>
            <button type="submit">@lang('Query')</button>
        </form>  
    </div>

    <!-- contact-section start -->
{{--    <section class="contact-section register-section ptb-80">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center align-items-center ml-b-30">--}}
{{--                <div class="col-lg-6 mrb-30">--}}
{{--                    <div class="register-form-area">--}}
{{--                        <h3 class="title">@lang('Shipment item query')</h3>--}}
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
    <!-- contact-section end -->

@endsection
