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
                        countries </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">


                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="{{ route('admingroup.create') }}">Add New</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <table class=" table table-striped table-bordered" id="dataTables">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>

                            <th>
                                Permission User Type
                            </th>

                            <th>
                                Permission Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp

                        @foreach ($Admingroups as $admingroup)

                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $admingroup->name }}</td>
                            <td>
                                <a href="{{ route('admingroup.show',$admingroup) }}" class="btn btn-primary btn-sm " data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="dsf" ><i class="fa fa-lock"></i></a>
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
    $("#dataTables").DataTable( {
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    } );

</script>
@stop
