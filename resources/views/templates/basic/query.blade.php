@extends($activeTemplate.'layouts.frontend')

@section('content')


    <!-- contact-section start -->
    <section class="contact-section register-section ptb-80">
        <div class="container">
            <div class="row justify-content-center align-items-center ml-b-30">
                <div class="col-lg-6 mrb-30">
                    <div class="register-form-area">
                        <h3 class="title">@lang('Shipment item query')</h3>
                        <form class="register-form" method="post" action="{{route('query')}}">
                            @csrf
                            <div class="row justify-content-center ml-b-20">
                                <div class="col-lg-6 form-group">
                                    <input name="item_id" type="text" placeholder="@lang('Item Number')">
                                </div>
                                <div class="col-lg-12 form-group text-center">
                                    <button type="submit" class="submit-btn">@lang('Query')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->

@endsection
