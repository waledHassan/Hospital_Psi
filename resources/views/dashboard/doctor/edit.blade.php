@extends('dashboard.layouts.app')
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Edit doctor  </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">


                <form method="post" action="{{ route('doctor.update', $doctor) }}" enctype="multipart/form-data">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    First Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="first_name" class="form-control" value="{{ $doctor->first_name }}" required>
                                </div>
                                @if ($errors->has('first_name'))
                                <h5>{{ $errors->first('first_name') }}</h5>
                                @endif
                            </div>

                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Second Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="second_name" class="form-control" value="{{ $doctor->second_name }}" required>
                                </div>
                                @if ($errors->has('second_name'))
                                <h5>{{ $errors->first('second_name') }}</h5>
                                @endif
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Last Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="last_name" class="form-control" value="{{ $doctor->last_name }}" required>
                                </div>
                                @if ($errors->has('last_name'))
                                <h5>{{ $errors->first('last_name') }}</h5>
                                @endif
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Email
                                </label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" class="form-control" value="{{ $doctor->email }}"
                                        required>

                                </div>
                                @if ($errors->has('email'))
                                <h5>{{ $errors->first('email') }}</h5>
                                @endif
                            </div>

                            <!--  <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                   Password
                                </label>
                                <div class="col-lg-6">
                                   <input type="password" name="password" class="form-control"   required>

                                </div>
                            </div> -->
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Phone
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="mobile_no" class="form-control" value="{{ $doctor->mobile_no }}"
                                        required>

                                </div>
                                @if ($errors->has('mobile_no'))
                                <h5>{{ $errors->first('mobile_no') }}</h5>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">

                                    <div class="offset-md-4">
                                        <button class="btn btn-success"><span>Update</span></button>
                                        <a href="{{ route('doctor.index') }}" class="btn btn-danger"><span>Cancel</span></a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>


@stop
