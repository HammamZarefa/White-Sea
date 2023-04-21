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
                                <th scope="col">@lang('ID')</th>
                                <th scope="col">@lang('Code')</th>
                                <th scope="col">@lang('Title')</th>
                                <th scope="col">@lang('Open Date')</th>
                                <th scope="col">@lang('Sending Date')</th>
                                <th scope="col">@lang('Notes')</th>
                                <th scope="col">@lang('Estimation')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($shipments as $shipment)
                                <tr>
                                    <td data-label="@lang('ID')">{{$shipment->id}}</td>
                                    <a href="{{route('admin.shipment.items',$shipment->id)}}">
                                        <td data-label="@lang('Code')">{{$shipment->shipment_id}}</td>
                                    </a>
                                    <td data-label="@lang('Title')">{{__($shipment->title)}}</td>
                                    <td data-label="@lang('Open Date')">{{$shipment->open_date}}</td>
                                    <td data-label="@lang('Sending Date')">{{$shipment->sending_date}}</td>
                                    <td data-label="@lang('Notes')">{{$shipment->note}}</td>
                                    <td data-label="@lang('Estimation')">{{$shipment->estimation}}</td>
                                    <td data-label="@lang('Status')">{{$shipment->status->name}}</td>
                                    <td data-label="@lang('Action')">
                                        <a href="javascript:void(0)" class="icon-btn ml-1 editBtn"
                                           data-original-title="@lang('Edit')" data-toggle="tooltip"
                                           data-url="{{ route('admin.shipments.update', $shipment->id)}}"
                                           data-title="{{ $shipment->title }}"
                                           data-open="{{$shipment->open_date}}"
                                           data-sending="{{$shipment->sending_date}}" data-notes="{{$shipment->notes}}"
                                           data-status="{{$shipment->status_id}}"
                                           data-estimation="{{$shipment->estimation}}">
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
            </div><!-- card end -->
        </div>
    </div>



    {{-- NEW MODAL --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i
                            class="fa fa-share-square"></i> @lang('Add New Shipment')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('admin.shipments.store')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Title') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="title" name="title" required
                                       placeholder="@lang('Enter Shipment Title')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Open Date') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="open" name="open" required
                                       placeholder="@lang('Enter Shipment Open Date')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Sending Date') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="sending" name="sending"
                                       required placeholder="@lang('Enter Shipment Sending Date')">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Notes') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea class="form-control has-error bold " id="note" name="note"
                                          placeholder="@lang('Enter Notes')"> </textarea>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Estimation') <span
                                    class="text-danger"></span></label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="estimation" name="estimation"
                                          placeholder="@lang('Enter estimation')"> </input>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Status') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <select name="status_id" class="form-control ">
                                    <option>@lang('Choose one')</option>
                                    @foreach($status as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary" id="btn-save" value="add">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i
                            class="fa fa-fw fa-share-square"></i>@lang('Edit')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Title') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="title" name="title"
                                       value="{{$shipment->title ?? ''}}" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Open Date') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="open" name="open"
                                       value="{{$shipment->open_date ?? ''}}" required>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Sending Date') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="sending" name="sending"
                                       value="{{$shipment->sending_date ?? ''}}" required>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Notes') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <textarea class="form-control has-error bold " id="note" name="note"
                                          placeholder="@lang('Enter Notes')">
                                {{$shipment->note ?? ''}}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Estimation') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control has-error bold " id="estimation" name="estimation"
                                       value="{{$shipment->estimation ?? ''}}" >
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <label class="font-weight-bold ">@lang('Status') <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <select name="status_id" class="form-control ">
                                    @foreach($status as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

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
                    <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
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
@endsection


@push('breadcrumb-plugins')
    <a class="btn btn-sm btn--primary box--shadow1 text-white text--small" data-toggle="modal" data-target="#myModal"><i
            class="fa fa-fw fa-plus"></i>@lang('Add New')</a>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var title = $(this).data('title');
                var open = $(this).data('open');
                var sending = $(this).data('sending');
                var notes = $(this).data('note');
                var estimation = $(this).data('estimation');
                var status=$(this).data('status')
                modal.find('form').attr('action', url);
                modal.find('input[name=title]').val(title);
                modal.find(('input[name=open]')).val(open);
                modal.find(('input[name=sending]')).val(sending);
                modal.find(('input[name=note]')).val(notes);
                modal.find(('input[name=estimation]')).val(estimation);
                modal.find(('select[name=status_id]')).val(status);
                $('.status_id option[value=status]');
                // modal.find(('select[name=type]')).val(type);
                modal.modal('show');
            });

            $('.statusBtn').on('click', function () {
                var modal = $('#statusModal');
                var url = $(this).data('url');

                modal.find('form').attr('action', url);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
