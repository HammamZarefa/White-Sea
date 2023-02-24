@extends($activeTemplate.'layouts.frontend')

@section('content')


    <!-- contact-section start -->
    <section class="contact-section register-section ptb-80">
        <div class="container">
            <div class="row justify-content-center align-items-center ml-b-30">
                <div class="col-lg-6 mrb-30">
                    <div class="register-form-area">
                        <h3 class="title">@lang('Shipment item query')</h3>
                        {{@$status}}
                        <h4>@lang('Packges Number') :  {{@$item->packages_number}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->

@endsection
