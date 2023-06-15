@extends('dashboard.layouts.app')
@section('content')
@inject('admingroups','App\Models\Admingroup')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Add Member </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a class="btn btn-brand btn-elevate btn-icon-sm" href=""">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" kt-portlet__body">

                            <form method="post" action="{{route('member.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="m-form__section m-form__section--first">


                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                First Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="fname" value="{{old('fname')}}" required>
                                            </div>
                                            @error('fname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Last Name
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="lname" value="{{old('lname')}}" required>
                                            </div>
                                            @error('lname')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                username
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="username" value="{{old('username')}}" required>
                                            </div>
                                            @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Postal Code
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="postal_code" value="{{old('postal_code')}}" required>
                                            </div>
                                            @error('postal_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Contact Number
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" name="mobile_no" value="{{old('mobile_no')}}" required>
                                            </div>
                                            @error('mobile_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                            </div>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Password
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="password" required>
                                            </div>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Password
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Country
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="country_id" id="govern">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                    <option {{old('country_id') == $country->id ? "selected" :''}} value="{{$country->id}}">{{$country->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('country_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                City
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="city_id" id="city">
                                                    <option value="">Select Country first</option>

                                                </select>
                                            </div>
                                            @error('city_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Address
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="address" value="{{old('address')}}" required>
                                            </div>

                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label class="col-lg-2 col-form-label">
                                                Title
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="title" id="title" required>
                                                    <option value="" disabled>Title </option>
                                                    <option {{old('Mr') == "Mr" ? "selected" :''}} value="Mr">Mr </option>
                                                    <option {{old('Mrs') == "Mrs" ? "selected" :''}} value="Mrs">Mrs </option>
                                                    <option {{old('Ms') == "Ms" ? "selected" :''}} value="Ms">Ms </option>
                                                    <option {{old('M/s') == "M/s" ? "selected" :''}} value="M/s">M/s </option>




                                                </select>
                                            </div>
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    roles
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="admingroup_id" id="govern">
                                        <option  value="">Select role</option>
                                        @foreach ($admingroups::get() as $admingroup)
                                            <option value="{{$admingroup->id}}">{{$admingroup->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('admingroup_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions">
                                        <div class="row">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-6">

                                                <button class="btn btn-success"><span>Create</span></button>
                                                <a href="{{route('member.index')}}" class="btn btn-danger"><span>Cancel</span></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @stop
            @section('script')
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