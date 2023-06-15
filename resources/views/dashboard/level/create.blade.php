@extends('dashboard.layouts.app')
@section('content')
@inject('categorys','\App\Models\Category' )
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Add Level </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('level.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">



            <form method="post" action="{{ route('level.store') }}" enctype="multipart/form-data" id="user">

                @csrf
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Category
                    </label>
                    <div class="col-lg-6">
                        <select class="form-control" name="category_id" required="">
                            <option value="">Select Category</option>
                            @foreach ($categorys->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Name
                    </label>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Description
                    </label>
                    <div class="col-lg-6">
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Image
                    </label>
                    <div class="col-lg-6">
                        <input type="file" name="photo" class="form-control" multiple="" required>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">Ordering
                    </label>
                    <div class="col-lg-6">
                        <input type="text" name="order" class="form-control" required="">
                    </div>
                </div>
                <div class="offset-md-4">
                    <button class="btn btn-success"><span>Submit</span></button>
                    <a href="{{ route('level.index') }}" class="btn btn-danger"><span>Cancel</span></a>


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
