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
                        Level </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('saas.level.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">




                <form method="post" action="{{ route('saas.level.update',$level->id) }}" enctype="multipart/form-data" id="user">
                    @csrf
                    @method('put')
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Category
                        </label>
                        <div class="col-lg-6">
                            <select class="form-control" name="category_id" required="">
                                <option value="null" >Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="input-box">
                        <div class="row">
                            <label class="col-md-3">Name</label>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" value="{{ $level->name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">
                            Image
                        </label>
                        <div class="col-lg-7">
                            <img src="" width="75">

                            <input type="file" class="form-control m-input" name="photo">

                            <input type="hidden" name="old_photo" value="{{ $level->image_name  }}">
                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">
                            Description
                        </label>
                        <div class="col-lg-7">
                            <textarea name="description" class="form-control">{{ $level->description }}</textarea>
                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">
                            Ordering
                        </label>
                        <div class="col-lg-7">
                            <input type="text" name="order" class="form-control" value="{{ $level->order }}" required="">
                        </div>
                    </div>


                    <div class="offset-md-4">
                        <button class="btn btn-success" type="submit"><span>Submit</span></button>
                        <a href="{{ route('saas.level.index') }}" class="btn btn-danger"><span>Cancel</span></a>


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
