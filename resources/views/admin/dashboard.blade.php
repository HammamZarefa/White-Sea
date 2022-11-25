@extends('admin.layouts.app')

@section('panel')

    <div class="row">
        @foreach($shipments as $shipment)
        <div class="col-sm-4" style="margin-bottom: 10px">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Title') : {{$shipment->title}}</h5>
                    <h6 class="card-title" >@lang('Shipment Number') : {{$shipment->shipment_id}}</h6>
                    <h6 class="card-title" >@lang('Open Date') : {{$shipment->open_date}}</h6>
                    <p class="card-text">@lang('Shipment Note') : {{$shipment->note}}</p>
<br>
                    <a href="{{route('admin.shipment.items',$shipment->id)}}" class="btn btn-primary">@lang('Shipment Deatils')</a>
                </div>
            </div>
        </div>
        @endforeach
        <br>

    </div>
    {{--@if(@json_decode($general->sys_version)->version > systemDetails()['version'])--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="card text-white bg-warning mb-3">--}}
                    {{--<div class="card-header">--}}
                        {{--<h3 class="card-title"> @lang('New Version Available')--}}
                            {{--<button--}}
                                {{--class="btn btn--dark float-right">@lang('Version') {{json_decode($general->sys_version)->version}}</button>--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title text-dark">@lang('What is the Update ?')</h5>--}}
                        {{--<p>--}}
                        {{--<pre class="f-size--24">{{json_decode($general->sys_version)->details}}</pre>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--@if(@json_decode($general->sys_version)->message)--}}
        {{--<div class="row">--}}
            {{--@foreach(json_decode($general->sys_version)->message as $msg)--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="alert border border--primary" role="alert">--}}
                        {{--<div class="alert__icon bg--primary"><i class="far fa-bell"></i></div>--}}
                        {{--<p class="alert__message">@php echo $msg; @endphp</p>--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                            {{--<span aria-hidden="true">×</span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<div class="row mb-none-30">--}}
        {{--<div class="col-xl-3  col-sm-6 mb-30">--}}
            {{--<div class="dashboard-w1 bg--primary b-radius--10 box-shadow">--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-users"></i>--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                        {{--<span class="amount">{{$widget['total_users']}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                        {{--<span class="text--small">@lang('Total Users')</span>--}}
                    {{--</div>--}}
                    {{--<a href="{{route('admin.users.all')}}"--}}
                       {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- dashboard-w1 end -->--}}
        {{--<div class="col-xl-3  col-sm-6 mb-30">--}}
            {{--<div class="dashboard-w1 bg--cyan b-radius--10 box-shadow">--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-users"></i>--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                        {{--<span class="amount">{{$widget['verified_users']}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                        {{--<span class="text--small">@lang('Total Verified Users')</span>--}}
                    {{--</div>--}}
                    {{--<a href="{{route('admin.users.active')}}"--}}
                       {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xl-3 col-sm-6 mb-30">--}}
            {{--<div class="dashboard-w1 bg--orange b-radius--10 box-shadow ">--}}
                {{--<div class="icon">--}}
                    {{--<i class="la la-envelope"></i>--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                        {{--<span class="amount">{{$widget['email_unverified_users']}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                        {{--<span class="text--small">@lang('Total Email Unverified Users')</span>--}}
                    {{--</div>--}}

                    {{--<a href="{{route('admin.users.emailUnverified')}}"--}}
                       {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- dashboard-w1 end -->--}}
        {{--<div class="col-xl-3  col-sm-6 mb-30">--}}
            {{--<div class="dashboard-w1 bg--pink b-radius--10 box-shadow ">--}}
                {{--<div class="icon">--}}
                    {{--<i class="fa fa-shopping-cart"></i>--}}
                {{--</div>--}}
                {{--<div class="details">--}}
                    {{--<div class="numbers">--}}
                        {{--<span class="amount">{{$widget['banned_users']}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="desciption">--}}
                        {{--<span class="text--small">@lang('Total Banned Users')</span>--}}
                    {{--</div>--}}

                    {{--<a href="{{route('admin.users.banned')}}"--}}
                       {{--class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- dashboard-w1 end -->--}}
    </div><!-- row end-->


    <div class="row mt-50 mb-none-30">
        {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
            {{--<a href="{{ route('admin.orders.all') }}">--}}
                {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                    {{--<i class="las la-shopping-cart overlay-icon text--primary"></i>--}}
                    {{--<div class="widget-two__icon b-radius--5 bg--primary">--}}
                        {{--<i class="las la-shopping-cart"></i>--}}
                    {{--</div>--}}
                    {{--<div class="widget-two__content">--}}
                        {{--<h2 class="">{{$widget['total_orders']}}</h2>--}}
                        {{--<p>@lang('Total Order')</p>--}}
                    {{--</div>--}}
                {{--</div><!-- widget-two end -->--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
            {{--<a href="{{ route('admin.orders.pending') }}">--}}
                {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                    {{--<i class="las la-spinner overlay-icon text--warning"></i>--}}
                    {{--<div class="widget-two__icon b-radius--5 bg--warning">--}}
                        {{--<i class="las la-spinner"></i>--}}
                    {{--</div>--}}
                    {{--<div class="widget-two__content">--}}
                        {{--<h2 class="">{{$widget['pending_orders']}}</h2>--}}
                        {{--<p>@lang('Pending Order')</p>--}}
                    {{--</div>--}}
                {{--</div><!-- widget-two end -->--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
            {{--<a href="{{ route('admin.orders.processing') }}">--}}
                {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                    {{--<i class="la la-refresh overlay-icon text--teal"></i>--}}
                    {{--<div class="widget-two__icon b-radius--5 bg--teal">--}}
                        {{--<i class="la la-refresh"></i>--}}
                    {{--</div>--}}
                    {{--<div class="widget-two__content">--}}
                        {{--<h2 class="">{{$widget['processing_orders']}}</h2>--}}
                        {{--<p>@lang('Processing Order')</p>--}}
                    {{--</div>--}}
                {{--</div><!-- widget-two end -->--}}
            {{--</a>--}}
        {{--</div>--}}
    </div>

    <div class="row mt-50 mb-none-30">
        {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
            {{--<a href="{{ route('admin.orders.completed') }}">--}}
                {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                    {{--<i class="las la-check-circle overlay-icon text--green"></i>--}}
                    {{--<div class="widget-two__icon b-radius--5 bg--green">--}}
                        {{--<i class="las la-check-circle"></i>--}}
                    {{--</div>--}}
                    {{--<div class="widget-two__content">--}}
                        {{--<h2 class="">{{$widget['completed_orders']}}</h2>--}}
                        {{--<p>@lang('Completed Order')</p>--}}
                    {{--</div>--}}
                {{--</div><!-- widget-two end -->--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
            {{--<a href="{{ route('admin.orders.cancelled') }}">--}}
                {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                    {{--<i class="las la-times-circle overlay-icon text--pink"></i>--}}
                    {{--<div class="widget-two__icon b-radius--5 bg--pink">--}}
                        {{--<i class="la la-times-circle"></i>--}}
                    {{--</div>--}}
                    {{--<div class="widget-two__content">--}}
                        {{--<h2 class="">{{$widget['cancelled_orders']}}</h2>--}}
                        {{--<p>@lang('Cancelled Order')</p>--}}
                    {{--</div>--}}
                {{--</div><!-- widget-two end -->--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="col-xl-4 col-sm-6 mb-30">--}}
            {{--<a href="{{ route('admin.orders.refunded') }}">--}}
                {{--<a href="{{ route('admin.orders.refunded') }}">--}}
                    {{--<div class="widget-two box--shadow2 b-radius--5 bg--white">--}}
                        {{--<i class="las la-fast-backward overlay-icon text--secondary"></i>--}}
                        {{--<div class="widget-two__icon b-radius--5 bg--secondary">--}}
                            {{--<i class="la la-fast-backward"></i>--}}
                        {{--</div>--}}
                        {{--<div class="widget-two__content">--}}
                            {{--<h2 class="">{{$widget['refunded_orders']}}</h2>--}}
                            {{--<p>@lang('Refunded Order')</p>--}}
                        {{--</div>--}}
                    {{--</div><!-- widget-two end -->--}}
                {{--</a>--}}
        {{--</div>--}}
    </div>


    <div class="row mt-50 mb-none-30">
        {{--<div class="col-xl-6 mb-30">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">@lang('Monthly  Deposit Report')</h5>--}}
                    {{--<div id="apex-bar-chart"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xl-6 mb-30">--}}
            {{--<div class="row mb-none-30">--}}
                {{--<div class="col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="widget-three box--shadow2 b-radius--5 bg--white">--}}
                        {{--<div class="widget-three__icon b-radius--rounded bg--primary box--shadow2">--}}
                            {{--<i class="las la-wallet "></i>--}}
                        {{--</div>--}}
                        {{--<div class="widget-three__content">--}}
                            {{--<h2 class="numbers">{{$payment['total_deposit']}}</h2>--}}
                            {{--<p class="text--small">@lang('Total Deposit')</p>--}}
                        {{--</div>--}}
                    {{--</div><!-- widget-two end -->--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="widget-three box--shadow2 b-radius--5 bg--white">--}}
                        {{--<div class="widget-three__icon b-radius--rounded bg--pink  box--shadow2">--}}
                            {{--<i class="las la-money-bill "></i>--}}
                        {{--</div>--}}
                        {{--<div class="widget-three__content">--}}
                            {{--<h2 class="numbers">{{getAmount($payment['total_deposit_amount'])}} {{__($general->cur_text)}}</h2>--}}
                            {{--<p class="text--small">@lang('Total Deposit')</p>--}}
                        {{--</div>--}}
                    {{--</div><!-- widget-two end -->--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="widget-three box--shadow2 b-radius--5 bg--white">--}}
                        {{--<div class="widget-three__icon b-radius--rounded bg--teal box--shadow2">--}}
                            {{--<i class="las la-money-check"></i>--}}
                        {{--</div>--}}
                        {{--<div class="widget-three__content">--}}
                            {{--<h2 class="numbers">{{getAmount($payment['total_deposit_charge'])}} {{__($general->cur_text)}}</h2>--}}
                            {{--<p class="text--small">@lang('Total Deposit Charge')</p>--}}
                        {{--</div>--}}
                    {{--</div><!-- widget-two end -->--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-sm-6 mb-30">--}}
                    {{--<div class="widget-three box--shadow2 b-radius--5 bg--white">--}}
                        {{--<div class="widget-three__icon b-radius--rounded bg--green  box--shadow2">--}}
                            {{--<i class="las la-money-bill-wave "></i>--}}
                        {{--</div>--}}
                        {{--<div class="widget-three__content">--}}
                            {{--<h2 class="numbers">{{$payment['total_deposit_pending']}}</h2>--}}
                            {{--<p class="text--small">@lang('Pending Deposit')</p>--}}
                        {{--</div>--}}
                    {{--</div><!-- widget-two end -->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div><!-- row end -->

    {{--<div class="row mb-none-30 mt-5">--}}
        {{--<div class="col-xl-4 col-lg-6 mb-30">--}}
            {{--<div class="card overflow-hidden">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">@lang('Login By Browser')</h5>--}}
                    {{--<canvas id="userBrowserChart"></canvas>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xl-4 col-lg-6 mb-30">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">@lang('Login By OS')</h5>--}}
                    {{--<canvas id="userOsChart"></canvas>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xl-4 col-lg-6 mb-30">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">@lang('Login By Country')</h5>--}}
                    {{--<canvas id="userCountryChart"></canvas>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Alert -->--}}
    {{--<div class="modal fade" id="cronModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-dialog-centered modal-lg" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLongTitle">@lang('Cron Job Setting Instruction')</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<h3 class="text--danger text-center">@lang('Please Set Cron Job Now')</h3>--}}
                    {{--<p class="lead">--}}
                        {{--@lang('To automate the api order placement, we need to set the cron job and make sure the cron job is running properly. Set the Cron time as minimum as possible. Once per 5-15 minutes is ideal while once every minute is the best option.') </p>--}}
                    {{--<label class="font-weight-bold">@lang('Cron Command')</label>--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" name="text" class="form-control form-control-lg" id="referralURL"--}}
                               {{--value="curl -s {{route('cron')}}" readonly>--}}
                        {{--<div class="input-group-append">--}}
                                    {{--<span class="input-group-text copytext btn--primary copyBoard" id="copyBoard"--}}
                                    {{--> @lang('Copy') </span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

{{--@push('breadcrumb-plugins')--}}
    {{--<span class=" @if(Carbon\Carbon::parse($general->last_cron)->diffInSeconds() < 300)--}}
        {{--text--info--}}
        {{--@elseif(Carbon\Carbon::parse($general->last_cron)->diffInSeconds() < 900)--}}
        {{--text--warning--}}
        {{--@else--}}
        {{--text--danger--}}
{{--@endif ">@lang('Last Cron Run') <strong>{{diffForHumans($general->last_cron)}}</strong>--}}
    {{--</span>--}}
{{--@endpush--}}

@push('script')

    <script src="{{asset('assets/admin/js/vendor/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendor/chart.js.2.8.0.js')}}"></script>

    <script>
        (function ($) {
            "use strict";
            //Show cron modal
            @if(Carbon\Carbon::parse($general->last_cron)->diffInMinutes() > 15)
            $('#cronModal').modal('show');
            @endif

            $('.copyBoard').on('click', function () {
                var copyText = document.getElementById("referralURL");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                /*For mobile devices*/
                document.execCommand("copy");
                iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
            });
        })(jQuery);
    </script>


    <script>
        "use strict";

        // apex-bar-chart js
        var options = {
            series: [{
                name: 'Total Deposit',
                data: [

                ]
            }],
            chart: {
                type: 'bar',
                height: 400,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {

            },
            yaxis: {
                title: {
                    text: "{{__($general->cur_sym)}}",
                    style: {
                        color: '#7c97bb'
                    }
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "{{__($general->cur_sym)}}" + val + " "
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
        chart.render();


    </script>



    <script>

        var ctx = document.getElementById('userBrowserChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {

                datasets: [{

                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                maintainAspectRatio: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });


        var ctx = document.getElementById('userOsChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ,
                datasets: [{
                    data: ,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 0.05)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            },
        });


        // Donut chart
        var ctx = document.getElementById('userCountryChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ,
                datasets: [{
                    data: ,
                    backgroundColor: [
                        '#ff7675',
                        '#6c5ce7',
                        '#ffa62b',
                        '#ffeaa7',
                        '#D980FA',
                        '#fccbcb',
                        '#45aaf2',
                        '#05dfd7',
                        '#FF00F6',
                        '#1e90ff',
                        '#2ed573',
                        '#eccc68',
                        '#ff5200',
                        '#cd84f1',
                        '#7efff5',
                        '#7158e2',
                        '#fff200',
                        '#ff9ff3',
                        '#08ffc8',
                        '#3742fa',
                        '#1089ff',
                        '#70FF61',
                        '#bf9fee',
                        '#574b90'
                    ],
                    borderColor: [
                        'rgba(231, 80, 90, 0.75)'
                    ],
                    borderWidth: 0,

                }]
            },
            options: {
                aspectRatio: 1,
                responsive: true,
                elements: {
                    line: {
                        tension: 0 // disables bezier curves
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>
@endpush
