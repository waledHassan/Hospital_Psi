@extends('saas.layouts.app')
@section('content')
    <style type="text/css">
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider-switch {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider-switch:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider-switch {
            background-color: #2196F3;
        }

        input:focus+.slider-switch {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider-switch:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider-switch.round {
            border-radius: 34px;
        }

        .slider-switch.round:before {
            border-radius: 50%;
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
                        Cities </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

                            <a class="btn btn-success pull-right" href="{{ route('saas.city.create') }}"><span>Create City </span></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">


                <table class="table table-striped table-bordered" id="dataTables">

                    <thead>
                        <tr>
                            <th>SNo</th>
                            <th>Cities Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count=1; @endphp

                        @foreach ($cities as $city)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" data-status="{{ $city->status }}" data-id="{{ $city->id }}"
                                        class="switch-input update_status" {{ ($city->status == 1) ? "checked" : "" }} >
                                    <span class="slider-switch round"></span>
                                </label>
                            </td>
                            <td>
                                <a href="{{ route('saas.city.edit',$city->id) }}"
                                    class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i
                                        class="fa fa-edit"></i></a>

                                <a href="{{ route('saas.city.get-destroy',$city->id) }}"
                                    class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only"
                                    onclick="return  confirm('are you sure?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @php $count++; @endphp

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop
@section('script')
<script type="text/javascript">
    $('#dataTables').DataTable({
        dom: "<'row'<'col-md-4'f><'ml-4'><'ml-4'B><'ml-4'><'ml-4'l>>rtip",
        buttons: [

            {
                extend: "print",
                exportOptions: {
                    columns: ":visible",
                    autoPrint: true,
                    orientation: "landscape",
                },
            },
            {
                extend: "csv",
                exportOptions: {
                    columns: ":visible",
                    autoPrint: true,
                    orientation: "landscape",
                },
            },
        ]
    });
 $('.update_status').change(function() {

    if($(this).is(":checked")) { var status = 1;}
    else{   var status = 2;  }

        var id= $(this).attr("data-id")
        //alert(id);
        $.ajax({
        url:"/saas/city/update-status/" +id + "/" +status ,
        success: function(e) {
        }
        });
});
</script>
@stop
