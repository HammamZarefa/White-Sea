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
                                {{--<th scope="col">@lang('Received Packages')</th>--}}
                                {{--<th scope="col">@lang('Delivered Packages')</th>--}}
                                {{--<th scope="col">@lang('Sending Date')</th>--}}
                                {{--<th scope="col">@lang('Delivery Method')</th>--}}
                                {{--<th scope="col">@lang('Recivied in Qatar')</th>--}}
                                {{--<th scope="col">@lang('Status')</th>--}}
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
                                    <td data-label="@lang('Sender Phone')">
                                        <a href="https://wa.me/send?phone=934626910&attachment=c://users/Hammam/Downloads/My.pdf">{{$item->sender_phone}}</a></td>
                                    <td data-label="@lang('Recipient Name')">{{$item->recipient_name}}</td>
                                    <td data-label="@lang('Recipient Phone')">{{ $item->recipient_phone }}</td>
                                    <td data-label="@lang('Destination')">{{ $item->destination }}</td>
                                    <td data-label="@lang('Package Content')">{!! $item->packages_content !!} </td>
                                    <td data-label="@lang('Packages Number')">{{ $item->packages_number }}</td>
                                    {{--<td data-label="@lang('Received Packages')">{{ $item->received_packages }}</td>--}}
                                    {{--<td data-label="@lang('Delivered Packages')">{{ $item->delivered_packages }}</td>--}}
                                    {{--<td data-label="@lang('Sending Date')">{{ $item->sending_date }}</td>--}}
                                    {{--<td data-label="@lang('Delivery Method')">{{ $item->delivery_method }}</td>--}}
                                    {{--<td data-label="@lang('Recivied in Qatar')">{{ $item->recivied_date_in_qatar }}</td>--}}
                                    {{--<td data-label="@lang('Sending from Qatar')">{{ $item->sending_date_from_qatar }}</td>--}}
                                    {{--<td data-label="@lang('Status')">{{ $item->status }}</td>--}}
                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.items.show', $item->id) }}"
                                           class="icon-btn btn--primary ml-1">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.items.edit', $item->id) }}"
                                           class="icon-btn btn--primary ml-1">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="icon-btn btn--danger ml-1 statusBtn"
                                           data-original-title="@lang('Status')" data-toggle="tooltip"
                                           data-url="{{ route('admin.item.status', $item->id) }}">
                                            <i class="la la-trash"></i>
                                        </a>
                                        <a href="{{ route('admin.item.print', $item->id) }}"
                                           class="icon-btn btn--primary ml-1">
                                            <i class="la la-print"></i>
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

                <div class="card-footer">
                {{ $items->links('admin.partials.paginate') }}
                </div>
            </div><!-- card end -->

        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="row">
        <div class="col-lg-6">
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
        <div class="col-lg-3">
            <div class="page-title">
                <a class="btn btn--primary"
                   href="{{route('admin.shipment.item.create',$shipment)}}">@lang('Add New Item')</a>
            </div>
        </div>
        <div class="col-lg-3">
            <a class="btn btn--primary" href="{{route('admin.shipment.item.export',$shipment)}}">
                @lang('Download CSV')
            </a>
        </div>
    </div>

    {{--// Status MODAL --}}
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Update Status')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    @csrf
                    {{--<input type="hidden" name="id" id="delete_id" class="delete_id" value="0">--}}
                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure to change the status?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn--primary">@lang('Yes')</button>
                    </div>
                </form>
            </div>
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

@push('script')
<script>
    (function ($) {
        "use strict";
        $('.statusBtn').on('click', function () {
            var modal = $('#statusModal');
            var url = $(this).data('url');

            modal.find('form').attr('action', url);
            modal.modal('show');
        });
    })(jQuery);
</script>
@endpush