@extends($activeTemplate.'layouts.frontend')

@section('content')
    <div class="center-section order-tracking">
        <div class="content-section response">
            <h3 class="title"><span class="f-1">@lang('Order')</span> <span class="f-2">@lang('Tracking')</span></h3>
            <div class="response-info">
                <div>
                    <span>@lang('Item number')</span>
                    <h6>{{$item->item_id}}</h6>
                </div>
                <div class="bord-un">
                    <hr class="h-left">
                    <span>@lang('Statue')</span>
                    <h6>{{@$status}}</h6>
                    <hr class="h-right">
                </div>
                <div>
                    <span>@lang('Expected Time')</span>
                    <h6>{{$estimation}}</h6>
                </div>
            </div>
            <a href="{{ route('query') }}" class="new-request" type="submit">@lang('New Request')</a>
        </div>
    </div>

    <!-- contact-section start -->
    {{--    <section class="contact-section register-section ptb-80">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-center align-items-center ml-b-30">--}}
    {{--                <div class="col-lg-6 mrb-30">--}}
    {{--                    <div class="register-form-area">--}}
    {{--                        <h3 class="title">@lang('Shipment item query')</h3>--}}
    {{--                        {{@$status}}--}}
    {{--                        <h4>@lang('Packges Number') :  {{@$item->packages_number}}</h4>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- contact-section end -->

@endsection
