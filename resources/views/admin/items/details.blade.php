@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">

            <div class="card b-radius--10 mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive--sm table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td data-label="@lang('Item ID')"><b>@lang('Item ID') : </b></td>
                                    <td data-label="@lang('Item ID')">{{ $item->item_id }}</td>

                                    <td data-label="@lang('Sender name')"><b>@lang('Sender name'): </b></td>
                                    <td data-label="@lang('Sender name')">{{ $item->sender_name}}</td>

                                    <td data-label="@lang('Sender Phone')"><b>@lang('Sender Phone') : </b></td>
                                    <td data-label="@lang('Sender Phone')">{{ $item->sender_phone }}</td>
                                </tr>

                                <tr>
                                    <td data-label="@lang('Shipment Number')"><b>@lang('Shipment Number'): </b></td>
                                    <td data-label="@lang('Shipment Number')">{{ $item->shipment }}</td>

                                    <td data-label="@lang('recipient_name')"><b>@lang('Recipient Name') :</b></td>
                                    <td data-label="@lang('recipient_name')">{{ $item->recipient_name }}</td>

                                    <td data-label="@lang('recipient_phone')"><b>@lang('Recipient Phone') : </b></td>
                                    <td data-label="@lang('recipient_phone')">{{ $item->recipient_phone }}</td>
                                </tr>

                                <tr>
                                    <td data-label="@lang('destination')"><b>@lang('Destination') : </b></td>
                                    <td data-label="@lang('destination')">{{ $item->destination }}</td>

                                    <td data-label="@lang('packages_content')"><b>@lang('Packages Content') : </b></td>
                                    <td data-label="@lang('packages_content')">{!! $item->packages_content !!} </td>

                                    <td></td>
                                </tr>

                                <tr>
                                    <td data-label="@lang('packages_number')"><b>@lang('Packages Number') : </b></td>
                                    <td data-label="@lang('packages_number')">{{ $item->packages_number }}</td>

                                    <td data-label="@lang('received_packages')"><b>@lang('Received Packages') : </b>
                                    </td>
                                    <td data-label="@lang('received_packages')">{{ $item->received_packages }}</td>

                                    <td data-label="@lang('lost_packages')"><b>@lang('Lost Packages') : </b></td>
                                    <td data-label="@lang('lost_packages')">{!! $item->lost_packages !!} </td>
                                </tr>

                                <tr>
                                    <td data-label="@lang('delivered_packages')"><b>@lang('Delivered Packages') : </b>
                                    </td>
                                    <td data-label="@lang('delivered_packages')">{{ $item->delivered_packages }}</td>

                                    <td data-label="@lang('remaining_packages')"><b>@lang('Remaining Packages') : </b>
                                    </td>
                                    <td data-label="@lang('remaining_packages')">{{ $item->remaining_packages }}</td>

                                    <td data-label="@lang('delivered_by')"><b>@lang('Delivered By') : </b></td>
                                    <td data-label="@lang('delivered_by')">{{ $item->delivered_by }} </td>
                                </tr>

                                <tr>

                                    <td data-label="@lang('sending_date')"><b>@lang('Sending Date') : </b></td>
                                    <td data-label="@lang('sending_date')">{{ $item->sending_date }}</td>

                                    <td data-label="@lang('sending_notes')"><b>@lang('Sending Notes') : </b></td>
                                    <td data-label="@lang('sending_notes')">{!! $item->sending_notes !!} </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td data-label="@lang('cost')"><b>@lang('Cost') : </b></td>
                                    <td data-label="@lang('cost')">{{ $item->cost }}</td>

                                    <td data-label="@lang('down_payment')"><b>@lang('Down Payment') : </b></td>
                                    <td data-label="@lang('down_payment')">{{ $item->down_payment }} </td>

                                    <td data-label="@lang('second_installment')"><b>@lang('Second Installment') : </b>
                                    </td>
                                    <td data-label="@lang('second_installment')">{{ $item->second_installment }}</td>
                                </tr>

                                <tr>
                                    <td data-label="@lang('remaining_amount')"><b>@lang('Remaining Amount') : </b></td>
                                    <td data-label="@lang('remaining_amount')">{{ $item->remaining_amount }}</td>

                                    <td data-label="@lang('delivery_method')"><b>@lang('Delivery Method') : </b></td>
                                    <td data-label="@lang('delivery_method')">{{ $item->delivery_method }}</td>

                                    <td data-label="@lang('delivered_date')"><b>@lang('Delivered Date') : </b></td>
                                    <td data-label="@lang('delivered_date')">{{ $item->delivered_date }}</td>
                                </tr>

                                <tr>

                                    <td data-label="@lang('status')"><b>@lang('Status') : </b></td>
                                    <td data-label="@lang('status')">{{ $item->status }}</td>
                                    <td data-label="@lang('notes')"><b>@lang('Notes') : </b></td>
                                    <td data-label="@lang('notes')">{{ $item->notes }} </td>
                                    <td></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div><!-- card end -->
        </div>
    </div>


    {{--// Status MODAL --}}
    <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id="invoice">
            <div class="container mb-3">
                <div class="d-flex flex-column border border-2 border-dark p-2 bg-light">
                    <div class="d-flex w-100 justify-content-between">
                        <span class="text-dark fw-bolder">اسم المستخدم:</span>
                        <span class="text-dark fw-bolder">${user_data.id}</span>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <span class="text-dark fw-bolder">معرف الكوبون:</span>
                        <span class="text-dark fw-bolder">${ticket_result.invoice_id}</span>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <span class="text-dark fw-bolder">تاريخ:</span>
                        <span class="text-dark fw-bolder">${dateString}</span>
                    </div>
                </div>
            </div>
            <div class="container mb-3">
                <div class="d-flex flex-column border border-2 border-dark p-2 bg-light">
                    <div class="d-flex w-100 justify-content-between">
                        <span class="text-dark fw-bolder"المبلغ:</span>
                        <span class="text-dark fw-bolder">${paid_amount.toFixed(2)} ${currency}</span>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <span class="text-dark fw-bolder">ارقام زوجيه:</span>
                        <span class="text-dark fw-bolder">1620470</span>
                    </div>
                    <div class="d-flex w-100 justify-content-center">
                        <span class="text-dark fw-bolder">${return_amount.toFixed(2) *paid_amount.toFixed(2) } ${currency}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" href="{{ url()->previous() }}"><i
                class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>

    <a class="btn btn-sm btn--primary box--shadow1 print"><i
                class="fa fa-fw fa-backward"></i>@lang('Go')</a>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.print').on('click', function () {
                var modal = $('#printModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush