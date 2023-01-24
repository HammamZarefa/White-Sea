@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('admin.items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="payment-method-header d-flex flex-wrap">
                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Item Number') <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control " placeholder="@lang('Item Number')" name="item_id" value="{{$item->item_id}}"/>
                                                <input type="hidden" class="form-control "  name="shipment" value="{{$item->shipment}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Destination') <span class="text-danger">*</span></label>
                                                <input type="text" name="destination" placeholder="@lang('Destination')" class="form-control border-radius-5" value="{{ $item->destination}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Packages Number') <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control " placeholder="@lang('Packages Number')" name="packages_number" value="{{ $item->packages_number }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Weight')  KG<span class="text-danger">*</span></label>
                                                <input type="string" class="form-control " placeholder="@lang('Weight')" name="weight" value="{{ $item->weight }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Sending Date') <span class="text-danger">*</span></label>
                                                <input type="date" name="sending_date" placeholder="@lang('Sending Date')" class="form-control border-radius-5" value="{{ $item->sending_date}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Recivied in Qatar') <span class="text-danger">*</span></label>
                                                <input type="date" name="recivied_date_in_qatar" placeholder="@lang('Recivied in Qatar')" class="form-control border-radius-5" value="{{ $item->recivied_date_in_qatar}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-method-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Sender')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Sender Name') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="sender_name" placeholder="@lang('Sender Name') " value="{{ $item->sender_name }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Sender Phone') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="@lang('Sender Phone')" name="sender_phone" value="{{ $item->sender_phone}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Recipient')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Recipient Name') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="@lang('Recipient Name')" name="recipient_name" value="{{ $item->recipient_name }}"/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Recipient Phone') <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="@lang('Recipient Phone')" name="recipient_phone" value="{{ $item->recipient_phone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card border--dark mt-3">
                                            <h5 class="card-header bg--dark">@lang('Packages Content')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea rows="2" class="form-control border-radius-5 " name="packages_content">{{$item->packages_content }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card border--dark mt-3">
                                            <h5 class="card-header bg--dark">@lang('Sending Notes')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <textarea rows="2" class="form-control border-radius-5" name="sending_notes">{{$item->sending_notes }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-method-body flex-wrap">
                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Cost') <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control " placeholder="@lang('Cost')" name="cost" value="{{$item->cost }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Down Payment') <span class="text-danger">*</span></label>
                                                <input type="number" name="down_payment" placeholder="@lang('Down Payment')" class="form-control border-radius-5" value="{{$item->down_payment }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Last Payment') <span class="text-danger">*</span></label>
                                                <input type="number" name="second_installment" placeholder="@lang('Last Payment')" class="form-control border-radius-5" value="{{ $item->second_installment }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Remaining Amount') <span class="text-danger">*</span></label>
                                                <input type="number" name="remaining_amount" placeholder="@lang('Remaining Amount')" class="form-control border-radius-5" value="{{ $item->remaining_amount }}"/>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Received Packages') <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control " placeholder="@lang('Received Packages')" name="received_packages" value="{{ $item->received_packages }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Lost Packages') <span class="text-danger">*</span></label>
                                                <input type="number" name="lost_packages" placeholder="@lang('Lost Packages')" class="form-control border-radius-5" value="{{ $item->lost_packages }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Delivered Packages') <span class="text-danger">*</span></label>
                                                <input type="number" name="delivered_packages" placeholder="@lang('Delivered Packages')" class="form-control border-radius-5" value="{{ $item->delivered_packages }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Remaining Packages') <span class="text-danger">*</span></label>
                                                <input type="number" name="remaining_packages" placeholder="@lang('Remaining Packages')" class="form-control border-radius-5" value="{{ $item->remaining_packages }}"/>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Delivered By') <span class="text-danger">*</span></label>
                                                <input type="text" name="delivered_by" placeholder="@lang('Delivered By')" class="form-control border-radius-5" value="{{ $item->delivered_by}}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Delivered Date') <span class="text-danger">*</span></label>
                                                <input type="date" name="delivered_date" placeholder="@lang('Delivered Date')" class="form-control border-radius-5" value="{{ $item->delivered_date }}"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Delivery Method') <span class="text-danger">*</span></label>
                                                <select type="delivery_method" class="form-control "  name="delivery_method">
                                                    <option value="1" {{$item->delivery_method== 1 ? 'selected' : ''}}>@lang('القدموس')</option>
                                                    <option value="2" {{$item->delivery_method== 2 ? 'selected' : ''}}>@lang('يدوي')</option>
                                                    <option value="3" {{$item->delivery_method== 3 ? 'selected' : ''}}>@lang('الهرم')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Status') <span class="text-danger">*</span></label>
                                                <select name="status_id" class="form-control ">
                                                    @foreach($status as $state)
                                                    <option value="{{$state->id}}" {{$item->status_id== $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Notes') <span class="text-danger">*</span></label>
                                                <textarea  name="notes" placeholder="@lang('Notes')" class="form-control border-radius-5">{{$item->notes}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary btn-block">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <a href="{{route('admin.shipment.items',$item->shipment)}}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i> @lang('Go Back') </a>
@endpush

@push('script')
    <script>

        $(function () {
            "use strict";
        $('input[name=currency]').on('input', function () {
            $('.currency_symbol').text($(this).val());
        });
        $('.addUserData').on('click', function () {
            var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="field_name[]" class="form-control" type="text" value="" required placeholder="@lang('Field Name')">
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="type[]" class="form-control">
                                    <option value="text" > @lang('Input Text') </option>
                                    <option value="textarea" > @lang('Textarea') </option>
                                    <option value="file"> @lang('File upload') </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="validation[]"
                                        class="form-control">
                                    <option value="required"> @lang('Required') </option>
                                    <option value="nullable">  @lang('Optional') </option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;
            $('.addedField').append(html)
        });

        $(document).on('click', '.removeBtn', function () {
            $(this).closest('.user-data').remove();
        });

        @if(old('currency'))
        $('input[name=currency]').trigger('input');
        @endif

        });
    </script>
@endpush
