@extends('dashboard.layouts.app')
@section('content')
@inject('country', 'App\Models\Country')
@php
$country=$country->findorfail($patient->country_id);

@endphp
    <style>
        .checkbox-right {
            float: right;
            margin-top: 12px;
        }
    </style>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Add Patient </h3>
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

                <form method="post" action="{{route('patient.update', $patient->id)}}" enctype="multipart/form-data" id="user">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Medical Record Number (MRN)
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="medical_no" value="{{$patient->medical_no }}" class="form-control" required>

                                </div>

                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    First Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="first_name" value="{{$patient->first_name }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Second Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="second_name" value="{{$patient->second_name }}" class="form-control" required>
                                </div>

                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Last Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" name="last_name" value="{{$patient->last_name}}" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Nationality
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="country_id" id="govern">
                                        <option  value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option {{$patient->country_id == $country->id ? "selected" :''}} value="{{$country->id}}">{{$country->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    City
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="city_id" id="city">
                                        <option value="">Select City</option>
                                        @foreach ($country->cities as $city)
                                            <option {{$patient->city_id == $city->id ? "selected" :''}} value="{{$city->id}}">{{$city->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Date of Birth
                                </label>
                                <div class="col-lg-6">
                                    <input type="date" value="{{$patient->dob}}" name="dob" class="form-control" required>

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Gender
                                </label>
                                <div class="col-lg-6">
                                    <select name="gender" class="form-control" required>
                                        <option value="">Select Gender</option>
                                        <option {{$patient->gender == "male" ? "selected" :''}}  value="male">Male</option>
                                        <option {{$patient->gender == "female" ? "selected" :''}}  value="female">Female</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Phone
                                </label>
                                <div class="col-lg-6">
                                    <input type="text"   value="{{$patient->mobile_no}}" name="mobile_no" class="form-control" required>

                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Email
                                </label>
                                <div class="col-lg-6">
                                    <input type="email"  value="{{$patient->email}}" name="email" class="form-control" required>

                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-6" style="background-color: #0057D9; color: white; text-align: center;">
                                    <label class="col-form-label">LEFT EAR</label>
                                </div>
                                <div class="col-lg-6" style="background-color: #FF0000; color: white; text-align: center;">
                                    <label class="col-form-label">RIGHT EAR</label>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-6" style="background-color: #0057D9; color: white">
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-1">
                                            <input type="radio" value="1" name="left_normal_hear"
                                            {{$patient->left_normal_hear == 1 ? "checked" :''}}
                                                class="checkbox-right left l_normal_hear">
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="col-form-label">Normal Hearing</label>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-1">
                                            <input type="radio" value="2" name="left_normal_hear"
                                            {{$patient->left_normal_hear == 2 ? "checked" :''}}
                                                class="checkbox-right left l_normal_hear">
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="col-form-label">Hearing Loss</label>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-12" style="text-align: center;">
                                            <label class="col-form-label">What do you wear on the LEFT side?</label>
                                            <hr>
                                        </div>
                                    </div>
                                    <select class="form-control" name="left_hearing_device" id="left_hearing_device"
                                        disabled>
                                        <option value="">Select Hearing Device</option>
                                        <option {{$patient->left_hearing_device == "1" ?'selected':''}} value="1">No Device</option>
                                        <option  {{$patient->left_hearing_device == "2" ?'selected':''}} value="2">A Hearing Aid </option>
                                        <option {{$patient->left_hearing_device == "3" ?'selected':''}} value="3">Cochlear implant </option>
                                        <option {{$patient->left_hearing_device == "4" ?'selected':''}} value="4">Hybrid system (Electroacoustic stimulation)</option>
                                        <option {{$patient->left_hearing_device == "5" ?'selected':''}} value="5">Middle ear implant</option>
                                        <option {{$patient->left_hearing_device == "6" ?'selected':''}} value="6">Bone condition implant </option>
                                        <option {{$patient->left_hearing_device == "7" ?'selected':''}} value="7">Auditory Brainstem implant </option>
                                        <option {{$patient->left_hearing_device == "8" ?'selected':''}} value="8">Adhesive bone conduction hearing aid (ADHEAR) </option>

                                    </select><br>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-10">
                                            <label class="col-form-label">When did you receive your hearing device?</label>
                                        </div>
                                        <div class="col-lg-12">

                                            <input type="text" name="left_implant_date" id="left_implant_date"
                                                value="{{$patient->left_implant_date}}" class="form-control"
                                                class="checkbox-right left form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6" style="background-color: #FF0000; color: white">

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-1">
                                            <input type="radio" value="1" name="right_normal_hear"
                                            {{$patient->right_normal_hear == 1 ? "checked" :''}}
                                                class="checkbox-right right r_normal_hear">
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="col-form-label">Normal Hearing</label>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-1">
                                            <input type="radio" value="2" name="right_normal_hear"
                                            {{$patient->right_normal_hear == 2 ? "checked" :''}}
                                                class="checkbox-right right r_normal_hear">
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="col-form-label">Hearing Loss</label>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-12" style="text-align: center;">
                                            <label class="col-form-label">What do you wear on the RIGHT side?</label>
                                            <hr>
                                        </div>
                                    </div>

                                    <select class="form-control" id="right_hearing_device" name="right_hearing_device"
                                        disabled>
                                        <option value="">Select Hearing Device</option>
                                        <option  {{$patient->right_hearing_device == "1" ?'selected':''}} value="1">No Device</option>
                                        <option  {{$patient->right_hearing_device == "2" ?'selected':''}} value="2">A Hearing Aid </option>
                                        <option  {{$patient->right_hearing_device == "3" ?'selected':''}} value="3">Cochlear implant </option>
                                        <option   {{$patient->right_hearing_device == "4" ?'selected':''}} value="4">Hybrid system (Electroacoustic stimulation)</option>
                                        <option  {{$patient->right_hearing_device == "5" ?'selected':''}} value="5">Middle ear implant</option>
                                        <option  {{$patient->right_hearing_device == "6" ?'selected':''}} value="6">Bone condition implant </option>
                                        <option  {{$patient->right_hearing_device == "7" ?'selected':''}} value="7">Auditory Brainstem implant </option>
                                        <option  {{$patient->right_hearing_device == "8" ?'selected':''}} value="8">Adhesive bone conduction hearing aid (ADHEAR) </option>
                                    </select><br>

                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-10">
                                            <label class="col-form-label">When did you receive your hearing device?</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="right_implant_date" id="right_implant_date"
                                                value="{{$patient->right_implant_date}}"
                                                class="checkbox-right right form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><br>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">

                                        <div class="offset-md-4">
                                            <button class="btn btn-success"><span>Update</span></button>
                                            <a href="{{route('patient.index')}}" class="btn btn-danger"><span>Cancel</span></a>

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
@section('script')

    <script type="text/javascript">
        $("#user").validate();
    </script>

    <script type="text/javascript">
        $(".l_normal_hear").click(function(event) {
            //alert($(this).val());
            $("#left_hearing_device").val("");
            if ($(this).val() == 2) {
                $('#left_hearing_device').removeAttr("disabled");

            } else {

                $('#left_hearing_device').attr("disabled", "disabled")
            }
        });


        $(".r_normal_hear").click(function(event) {

            $("#left_hearing_device").val("");
            if ($(this).val() == 2) {
                $('#right_hearing_device').removeAttr("disabled");

            } else {

                $('#right_hearing_device').attr("disabled", "disabled")
            }
        });

        //  $("#r_hear_loss").click(function(event){

        //     $('#right_hearing_device').attr("disabled","disabled")
        // });
        $("#left_implant_date").datepicker({
            "format": "yyyy-mm-dd"
        })
        $("#right_implant_date").datepicker({
            "format": "yyyy-mm-dd"
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#govern').on('change', function() {
                console.log('hey');

                var govern_id = this.value;
                if (govern_id != null && govern_id != "") {
                    $.ajax({
                        url: "{{ url('admin/get-cities') }}",
                        type: "get",
                        data: {
                            govern_id: govern_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {

                            if (result) {
                                $('#city').empty();
                                $('#city').append(
                                    '<option value="">Cities</option>');
                                $.each(result, function(index, city) {
                                    $("#city").append('<option value="' + city.id +
                                        '">' + city.name + '</option>');
                                });
                                $("#city").trigger('change');
                            } else {
                                $("#city").empty();
                                $("#city").trigger('change');
                            }
                        }
                    });
                }



            })
        });
    </script>


@stop
