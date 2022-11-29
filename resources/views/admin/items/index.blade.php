@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Item ID')</th>
                                <th scope="col">@lang('Sender Name')</th>
                                <th scope="col">@lang('Sender Phone')</th>
                                <th scope="col">@lang('Recipient Name')</th>
                                <th scope="col">@lang('Recipient Phone')</th>
                                <th scope="col">@lang('Destination')</th>
                                <th scope="col">@lang('Package Content')</th>
                                <th scope="col">@lang('Packages Number')</th>
                                <th scope="col">@lang('Received Packages')</th>
                                <th scope="col">@lang('Delivered Packages')</th>
                                <th scope="col">@lang('Sending Date')</th>
                                <th scope="col">@lang('Delivery Method')</th>
                                <th scope="col">@lang('Status')</th>
                                {{--<th scope="col">@lang('Status')</th>--}}
                                {{--<th scope="col">@lang('API Order')</th>--}}
                                {{--<th scope="col">@lang('Date')</th>--}}
                                <th scope="col">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td data-label="@lang('Item ID')">{{ $item->item_id }}</td>
                                    <td data-label="@lang('Sender Name')">{{$item->sender_name}}</td>
                                    <td data-label="@lang('Sender Phone')">{{$item->sender_phone}}</td>
                                    <td data-label="@lang('Recipient Name')">{{$item->recipient_name}}</td>
                                    <td data-label="@lang('Recipient Phone')">{{ $item->recipient_phone }}</td>
                                    <td data-label="@lang('Destination')">{{ $item->destination }}</td>
                                    <td data-label="@lang('Package Content')">{!! $item->packages_content !!} </td>
                                    <td data-label="@lang('Packages Number')">{{ $item->packages_number }}</td>
                                    <td data-label="@lang('Received Packages')">{{ $item->received_packages }}</td>
                                    <td data-label="@lang('Delivered Packages')">{{ $item->delivered_packages }}</td>
                                    <td data-label="@lang('Sending Date')">{{ $item->sending_date }}</td>
                                    <td data-label="@lang('Delivery Method')">{{ $item->delivery_method }}</td>
                                    <td data-label="@lang('Status')">{{ $item->status }}</td>
                                    {{--<td data-label="@lang('Status')">--}}
                                    {{--@if($item->status === 0)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--warning">@lang('Pending')</span>--}}
                                    {{--@elseif($item->status === 1)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--primary">@lang('Processing')</span>--}}
                                    {{--@elseif($item->status === 2)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--success">@lang('Completed')</span>--}}
                                    {{--@elseif($item->status === 3)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--danger">@lang('Cancelled')</span>--}}
                                    {{--@elseif($item->status === 4)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--danger">@lang('Refunded')</span>--}}
                                    {{--@elseif($item->status===5)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--dark">@lang('Waiting Code')</span>--}}
                                    {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td data-label="@lang('API Order')">--}}
                                    {{--@if($item->api_order)--}}
                                    {{--<span--}}
                                    {{--class="text--small badge font-weight-normal badge--primary">@lang('Api')</span>--}}
                                    {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td data-label="@lang('Date')">{{ showDateTime($item->created_at) }}</td>--}}
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.items.show', $item->id) }}"
                                           class="icon-btn btn--primary ml-1">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.items.edit', $item->id) }}"
                                           class="icon-btn btn--primary ml-1">
                                            <i class="la la-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>

                {{--<div class="card-footer">--}}
                {{--{{ $orders->links('admin.partials.paginate') }}--}}
                {{--</div>--}}
            </div><!-- card end -->

        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="row">
        <div class="col-lg-4">
            <form action="{{ route('admin.shipment.item.search',$shipment) }}" method="GET"
                  class="form-inline float-sm-right bg--white">
                <div class="input-group has_append">
                    <input type="text" name="search" class="form-control"
                           placeholder="@lang('Sender ,Recipient or Item ID')" value="{{ $search ?? '' }}" required>
                    <div class="input-group-append">
                        <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="page-title">
                <a class="btn btn--primary"
                   href="{{route('admin.shipment.item.create',$shipment)}}">@lang('Add New Item')</a>
            </div>
            <a class="btn btn--primary" href="{{route('admin.shipment.item.export',$shipment)}}">
                @lang('Download CSV')
            </a>
        </div>

    </div>
@endpush


@push('style')
    <style>
        .break_line {
            white-space: initial !important;
        }
    </style>
@endpush
<script type="text/javascript">
    function tableToCSV() {

        // Variable to store the final csv data
        var csv_data = [];

        // Get each row data
        var rows = document.getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {

            // Get each column data
            var cols = rows[i].querySelectorAll('td,th');

            // Stores each csv row data
            var csvrow = [];
            for (var j = 0; j < cols.length; j++) {

                // Get the text data of each cell
                // of a row and push it to csvrow
                csvrow.push(cols[j].innerHTML);
            }

            // Combine each column value with comma
            csv_data.push(csvrow.join(","));
        }

        // Combine each row data with new line character
        csv_data = csv_data.join('\n');

        // Call this function to download csv file
        downloadCSVFile(csv_data);

    }

    function downloadCSVFile(csv_data) {

        // Create CSV file object and feed
        // our csv_data into it
        CSVFile = new Blob([csv_data], {
            type: "text/csv"
        });

        // Create to temporary link to initiate
        // download process
        var temp_link = document.createElement('a');

        // Download csv file
        temp_link.download = "GfG.csv";
        var url = window.URL.createObjectURL(CSVFile);
        temp_link.href = url;

        // This link should not be displayed
        temp_link.style.display = "none";
        document.body.appendChild(temp_link);

        // Automatically click the link to
        // trigger download
        temp_link.click();
        document.body.removeChild(temp_link);
    }
</script>
