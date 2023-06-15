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


                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('saas.level.create') }}">Add New</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">


                <table class=" table table-striped table-bordered" id="dataTables">
                    <thead>
                        <tr>
                            <th>SNo</th>
                            <th>Category</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th>Ordering</th>
                            <th>Add Question</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp

                        @foreach ($levels as $level)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $level->category->name }}</td>
                                <td>{{ $level->name }}</td>
                                <td>{{ $level->description }}</td>
                                <td><input name="text" data-id="{{ $level->id }}" value="{{ $level->order }}"
                                        class="ordering form-control" style="width:100px">
                                </td>
                                <td>
                                    <a href="{{ route('saas.question.create') }}"
                                        class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i
                                            class="fa fa-plus"></i></a>
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" data-status="{{ $level->status }}"
                                            data-id="{{ $level->id }}" class="switch-input update_status"
                                            {{ $level->status == 1 ? 'checked' : '' }}>
                                        <span class="slider-switch round"></span>
                                    </label>
                                </td>
                                <td>
                                    {{-- {{ route('saas.level.edit', $level->id) }} --}}

                            <a href="  {{ route('saas.level.show',$level->id) }}"
                                class="btn btn-primary m-btn m-btn--icon btn-sm m-btn--icon-only"><i
                                    class="fa fa-eye"></i></a>

                                    <a href="{{ route('saas.level.edit',$level->id) }}"
                                        class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i
                                            class="fa fa-edit"></i></a>

                                    <a href="{{ route('saas.level.get-destroy', $level->id) }}"
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

            if ($(this).is(":checked")) {
                var status = 1;
            } else {
                var status = 2;
            }

            var id = $(this).attr("data-id")
            //alert(id);
            $.ajax({
                url: "/saas/level/update-status/" + id + "/" + status,
                success: function(e) {}
            });
        });

        $("body").on("input", ".ordering", function() {
            var num = $(this).val();
            var id = $(this).attr("data-id")
            console.log(num);
            console.log(id);

            if (num) {
            console.log(1233);

                $.ajax({
                    url: "/saas/level/orderings/" + id + "/" + num,
                    success: function(e) {
                        //alert(e);
                    }
                });
            }

        });
    </script>
@stop
