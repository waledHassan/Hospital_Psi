@extends('dashboard.layouts.app')
@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        categories </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">


                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('category.create') }}">Add New</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <table class=" table table-striped table-bordered" id="dataTables">
                    <thead>
                        <tr>
                            <th>SNo</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp

                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" data-status="{{ $category->status }}" data-id="{{ $category->id }}"
                                        class="switch-input update_status" {{ ($category->status == 1) ? "checked" : "" }} >
                                    <span class="slider-switch round"></span>
                                </label>
                            </td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}"
                                    class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i
                                        class="fa fa-edit"></i></a>

                                <a href="{{ route('category.get-destroy',$category->id) }}"
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

    <!-- end:: Content -->
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
        url:"/admin/category/update-status/" +id + "/" +status ,
        success: function(e) {
        }
        });
});
</script>
@stop
