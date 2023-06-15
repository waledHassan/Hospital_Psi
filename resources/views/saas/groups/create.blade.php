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
                    roles
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('saas.admingroup.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">


            <form method="post" action="{{ route('saas.admingroup.store') }}" enctype="multipart/form-data" id="user">
                @csrf
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Name
                    </label>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>

                <div class="offset-md-4">
                    <button class="btn btn-success"><span>Create</span></button>
                    <a href="{{ route('admingroup.index') }}" class="btn btn-danger"><span>Cancel</span></a>


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
