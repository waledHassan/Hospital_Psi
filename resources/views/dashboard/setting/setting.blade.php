@extends('dashboard.layouts.app')
@section('content')

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Setting </h3>
                </div>

            </div>
            <div class="kt-portlet__body">



                <!--begin::Form-->
                <form class="m-form" action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Logo 1

                                </label>
                                <div class="col-lg-6">

                                    <img src="{{ optional($setting)->img1 }}" width="200">

                                    <input type="file" class="form-control m-input" placeholder="" name="img1">
                                    <input type="hidden" name="company_logo_old" value="">
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Logo 2
                                </label>
                                <div class="col-lg-6">
                                    <img src="{{ optional($setting)->img2 }}" width="200">
                                    <input type="file" class="form-control m-input" placeholder="" name="img2">
                                    <input type="hidden" name="company_logo2_old" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Fav Icon
                                </label>
                                <div class="col-lg-6">
                                    <img src="{{ optional($setting)->imgvaf }}" width="64">
                                    <input type="file" class="form-control m-input" placeholder="" name="imgvaf">
                                    <input type="hidden" name="company_fav_old" value="">
                                </div>
                            </div>

                            {{-- <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="company_name"
                                        value="Pediatric speech Intelligibility">

                                </div>
                            </div> --}}
                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Address
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="address"
                                        value="{{optional($setting)->address}}">

                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Email
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="email"
                                        value=" {{optional($setting)->email}}">

                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Company Mobile
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="mobile"
                                        value="{{optional($setting)->mobile}}">

                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Currency
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="currency"
                                        value="{{optional($setting)->currency}}">

                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Facbook
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="facbook"
                                        value="{{optional($setting)->facbook}}">

                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Twitter
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="twitter"
                                        value="{{optional($setting)->twitter}}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Google Plus
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="google_plus"
                                        value="{{optional($setting)->google_plus}}">

                                </div>
                            </div>
                            {{-- <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Instrgram
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control m-input" placeholder="" name="instrgram"
                                        value="">

                                </div>
                            </div> --}}


                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Meta Title
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control m-input" placeholder="Enter Meta Title" name="meta_title"> v{{optional($setting)->meta_title}}</textarea>


                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Meta Keyword
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control m-input" placeholder="Enter Meta Title" name="meta_keyword"> {{optional($setting)->meta_keyword}}</textarea>


                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Meta Description
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control m-input" placeholder="Enter Meta Description" name="meta_description">{{optional($setting)->meta_description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Header script
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control m-input" placeholder="Enter Header script" name="header_script">{{optional($setting)->header_script}}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                    Footer script
                                </label>
                                <div class="col-lg-6">
                                    <textarea class="form-control m-input" placeholder="Enter Footer script" name="footer_script">{{optional($setting)->footer_script}}</textarea>
                                </div>
                            </div>
                            <div class="offset-md-4">

                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end::Section-->

    </div>
    <!--end::Form-->

@stop
@section('script')
    <script type="text/javascript">
        var KTFormControls = {
            init: function() {
                $("#kt_form_1").validate();
            }
        }

        jQuery(document).ready(function() {
            KTFormControls.init()
        });
        $(document).on("input", ".inputs", function() {

            var purchase = $(".purchase").val();
            var commission = $(".commission").val();
            console.log(purchase + '----' + commission);
            if (purchase && commission) {
                var total = calculate(purchase, commission);
                $(".total").val(total.toFixed(2));
                $(".total_html").html(total.toFixed(2));
            }
        });

        function calculate(amount, perntage) {
            return parseFloat(amount) + parseFloat((perntage / 100) * amount);
        }
    </script>
@stop
