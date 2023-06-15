@extends('saas.layouts.app')
@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg" id="headerdiv">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        view Level </h3>
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

                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>Level </th>
                            <td>{{ $level->name }}</td>
                        </tr>
                        <tr>
                            <th>Description </th>
                            <td>{{ $level->description }}</td>
                        </tr>
                        <tr>
                            <th>Ordering </th>
                            <td>{{ $level->order }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($level->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Deactivate</span>
                                @endif
                            </td>
                        </tr>
                    </thead>
                </table>

                <h3>A&Q</h3>

                <div>
                        @foreach ($questions as $question)
                        <h6>Question: {{$question->name}}</h6>
                        <div>
                            @foreach ($question->answers as $item)
                                <img src="{{ $item->answer }}" class="full-width-home" height="100px" width="100px">
                                @if ($item->correct_answer)
                                    <span class="badge badge-success"> <i class="flaticon2-checkmark"></i></span>
                                @else
                                    <span class="badge badge-danger"> <i class="flaticon2-delete"></i></span>
                                @endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>


            </div>
        </div>
    </div>

    <!-- end:: Content -->
    </div>
@stop
