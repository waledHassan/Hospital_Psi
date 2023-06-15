@extends('saas.layouts.app')
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Change Password
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">


            <form method="post" action="{{ route('saas.change-password.update') }}" enctype="multipart/form-data" id="user">
                @csrf
                @method('put')
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">old password
                    </label>
                    <div class="col-lg-6">
                        <input type="password" name="old_password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label"> New Password
                    </label>
                    <div class="col-lg-6">
                        <input type="password" name=" password" class="form-control" required>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label"> Confirm Password
                    </label>
                    <div class="col-lg-6">
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>


                <div class="offset-md-4">
                    <button class="btn btn-success"><span>submit</span></button>

                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>
@stop
@section('script')

<script type="text/javascript">
    $("#user").validate();
</script>
@stop
