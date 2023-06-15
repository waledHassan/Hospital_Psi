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
                        Members </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{route('member.create')}}">Add New</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">




                <table class="table table-striped table-bordered" id="datatables">
                    <thead>
                        <tr>
                            <th>SNo</th>
                            <th>Name</th>
                            <th>username</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Title</th>

                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp

                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $member->fname }} {{ $member->lname }}</td>
                                <td>{{ $member->username }} </td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->mobile_no }}</td>
                                <td>{{ $member->title }}</td>

                                <td> <label class="switch">
                                        <input type="checkbox" data-status="{{ $member->active }}"
                                            data-id="{{ $member->id }}" class="switch-input update_status"
                                            {{ $member->active == 1 ? 'checked' : '' }}>
                                        <span class="slider-switch round"></span>
                                    </label>

                                </td>
                                <td>

                                    <a href="{{ route('member.edit', $member->id) }}"
                                        class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i
                                            class="fa fa-edit"></i></a>

                                    <a href="{{ route('member.get-destroy', $member->id) }}"
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
        $("#dataTables").DataTable();
    </script>

    <script type="text/javascript">
        $("#dataTables").DataTable();
        $('.update_status').change(function() {

            if ($(this).is(":checked")) {
                var status = 1;
            } else {
                var status = 2;
            }

            var id = $(this).attr("data-id")
            //alert(id);
            $.ajax({
                url: "/admin/member/update-status/" + id + "/" + status,
                success: function(e) {}
            });
        });
    </script>
@stop
