@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two custom-data-table">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('id')</th>
                                    <th scope="col">@lang('payment_recipient')</th>
                                    <th scope="col">@lang('amount')</th>
                                    <th scope="col">@lang('payment_method')</th>
                                    <th scope="col">@lang('date')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($expenses as $expense)
                                <tr>
                                    <td data-label="@lang('id')">{{$expense->id}}</td>
                                    <td data-label="@lang('payment_recipient')">{{$expense->recipient}}</td>
                                    <td data-label="@lang('amount')">{{$expense->amount}}</td>
                                    <td data-label="@lang('payment_method')">{{$expense->payment_method}}</td>
                                    <td data-label="@lang('date')">{{$expense->date}}</td>
                                    <td data-label="@lang('Action')">
                                        @can('admin')
                                            <a href="javascript:void(0)" class="icon-btn ml-1 editBtn"
                                                data-original-title="@lang('Edit')" data-toggle="tooltip"
                                                data-url="{{ route('admin.expenses.update', $expense->id)}}"
                                           data-amount="{{ $expense->amount }}"
                                           data-date="{{$expense->date}}"
                                           data-recipient="{{$expense->recipient}}"
                                           data-payment_method="{{$expense->payment_method}}"
                                           >
                                                <i class="la la-edit"></i>
                                            </a>
                                        @endcan
                                        @can('admin')
                                        <form
                                        class="ml-1"
                                        action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                 class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('delete')"
                                                >
                                                <i class="la la-trash"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- NEW MODAL --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> @lang('Add New expense')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('admin.expenses.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Amount') <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="number" min=0 class="form-control has-error bold " id="amount" name="amount"
                                    required placeholder="@lang('Enter Amount')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('recipient') <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="recipient" name="recipient"
                                    required placeholder="@lang('Enter recipient')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('payment_method') </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="payment_method"
                                    name="payment_method" required placeholder="@lang('Enter payment_method')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('recipient Date')</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="date" name="date"
                                    required placeholder="@lang('Enter Recipient Date')">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="btn-save"
                            value="add">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-fw fa-share-square"></i>@lang('Edit')
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Amount') <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control has-error bold " id="amount" name="amount"
                                    value="{{ $expense->amount ?? '' }}" required placeholder="@lang('Enter Amount')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('recipient') <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="recipient"
                                    name="recipient" value="{{ $expense->recipient ?? '' }}" required
                                    placeholder="@lang('Enter recipient')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('payment_method') </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="payment_method"
                                    value="{{ $expense->payment_method ?? '' }}" name="payment_method" required
                                    placeholder="@lang('Enter payment_method')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('recipient Date')</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="date" name="date"
                                    value="{{ $expense->date ?? '' }}" required placeholder="@lang('Enter Recipient Date')">
                            </div>
                        </div>

                        {{--  --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary" id="btn-save"
                                value="add">@lang('Update')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" data-toggle="modal" data-target="#myModal"><i
            class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.editBtn').on('click', function() {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var amount = $(this).data('amount');
                var date = $(this).data('date');
                var recipient = $(this).data('recipient');
                var payment_method = $(this).data('payment_method');
                modal.find('form').attr('action', url);
                modal.find('input[name=amount]').val(amount);
                modal.find(('input[name=date]')).val(date);
                modal.find(('input[name=recipient]')).val(recipient);
                modal.find(('input[name=payment_method]')).val(payment_method);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
