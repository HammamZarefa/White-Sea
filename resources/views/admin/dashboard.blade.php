@extends('admin.layouts.app')

@section('panel')
    <div class="row" style="margin-bottom: 10px;text-align: right">
        <h5>بحث عن اشعار</h5>
        <div class="col-lg-12">
            <form action="{{route('admin.shipment.items.search')}}" method="GET"
                  class="form-inline float-sm-right bg--white">
                <div class="input-group has_append">
                    <input style="width: 24%" type="text" name="name" class="form-control"
                           placeholder="@lang('مرسل ,مستلم')" value="{{ request()->name ?? '' }}">
                    <input type="text" name="phone" class="form-control"
                           placeholder="@lang('Sender Phone')" value="{{ request()->phone ?? '' }}">
                    <input type="text" name="item" class="form-control"
                           placeholder="@lang('Item ID')" value="{{ request()->item ?? '' }}">
                    <div class="input-group-append">
                        <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="input-group-append mr-2">
                        <a href="" class="btn btn--danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h5 style="text-align: right">الشحنات</h5>
    <div class="row" title="الشحنات">
        @foreach($shipments as $shipment)
            <div class="col-sm-6" style="margin-bottom: 10px;text-align: right">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@lang('Title') : {{$shipment->title}}</h5>
                        <h6 class="card-title">@lang('Shipment Number') : {{$shipment->shipment_id}}</h6>
                        <h6 class="card-title">@lang('Open Date') : {{$shipment->open_date}}</h6>
                        <p class="card-title">@lang('Status') : {{$shipment->status->name}}</p>
                        <p class="card-text">@lang('Shipment Note') : {{$shipment->note}}</p>
                        <h6 class="card-title">@lang('Package number')
                            : {{$shipment->shipment_items_sum_packages_number}}</h6>
                        <h6 class="card-title">@lang('Paid amount') :
                            {{$shipment->shipment_items_sum_down_payment + $shipment->shipment_items_sum_second_installment}}</h6>
                        <h6 class="card-title">@lang('Rest amount')
                            : {{$shipment->shipment_items_sum_remaining_amount}}</h6>
                        <h6 class="card-title">@lang('Weight')
                            : {{$shipment->shipment_items_sum_weight}}  كغ</h6>
                        <br>
                        <a href="{{route('admin.shipment.items',$shipment->id)}}"
                           class="btn btn-primary">@lang('Shipment Deatils')</a>
                        <a href="{{route('admin.shipment.item.create',$shipment->id)}}"
                           class="btn btn-success">@lang('Add Item')</a>
                        <a href="{{route('admin.shipment.item.export',$shipment->id)}}"
                           class="btn btn-warning">@lang('Export Items')</a>
                    </div>
                </div>
            </div>
        @endforeach
        <br>

    </div>

    </div><!-- row end-->


    <div class="row mt-50 mb-none-30">

    </div>

    <div class="row mt-50 mb-none-30">

    </div>


    <div class="row mt-50 mb-none-30">

    </div><!-- row end -->

@endsection



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
                data: []
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
            xaxis: {},
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
                labels:,
                datasets: [{
                    data:,
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
                labels:,
                datasets: [{
                    data:,
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
