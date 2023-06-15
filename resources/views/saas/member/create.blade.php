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
                        Add Member </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('saas.member.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <form method="post" action="{{route('saas.member.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">


                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Name
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{old('fname')}}" required>
                                </div>
                                @error('fname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Email
                                </label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" name="email"value="{{old('email')}}"  required>
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
                                    confirmation Password
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">role
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" name="admingroup_id" required>
                                        <option value="null" >Select role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">

                                    <button class="btn btn-success"><span>Create</span></button>
                                    <a href="{{route('saas.member.index')}}" class="btn btn-danger"><span>Cancel</span></a>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
