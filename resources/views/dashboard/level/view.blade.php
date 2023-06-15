@extends('dashboard.layouts.app')
@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg" id="headerdiv">
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
                            <!--
                                                 <p><button onclick="printDiv('printdiv')" class="btn btn-brand btn-elevate btn-icon-sm" id="printpagebutton">Print</button></p> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" id="printdiv">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <strong>
                                hamadaaa
                            </strong>

                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>Level </th>
                            <td>hamada</td>
                        </tr>
                        <tr>
                            <th>Description </th>
                            <td>hamada is here</td>
                        </tr>
                        <tr>
                            <th>Ordering </th>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>

                                <span class="badge badge-success">Active</span>
                                <span class="badge badge-danger">Deactivate</span>
                            </td>
                        </tr>
                    </thead>
                </table>

                <h3>A&Q</h3>

                <div>
                    <h6>Question</h6>
                    <div>

                        <img src="{{ asset('assets/images/question/answer-1.jpg') }}" class="full-width-home" height="100px"
                            width="100px">
                        <span class="badge badge-success"> <i class="flaticon2-checkmark"></i></span>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- end:: Content -->
    </div>
@stop
