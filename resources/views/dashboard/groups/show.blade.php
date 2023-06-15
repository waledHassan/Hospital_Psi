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
                    permissions
                </h3>
            </div>

        </div>





        <!--begin::Form-->
        <form class="m-form m-form--label-align-right" action="" method="post">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">


                    <!--begin::Portlet-->
                    <div class="kt-portlet">

                        <div class="kt-portlet__body">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#m_tabs_2_1">Doctor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_2_2">Patient</a>
                                </li>
                               


                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_2_6">Groups</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_tabs_2_7">Setting</a>
                                </li>


                            </ul>

                            <div class="tab-content">


                                <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">

                                    @foreach ($admingroup->permissions()->where('name','like','%doctor%')->get() as $adminrole)
                                        <div class="form-group m-form__group row">

                                            <label class="col-lg-2 col-form-label">
                                                {{ $adminrole->name }}
                                            </label>
                                            <div class="col-lg-10 checkbox_div">

                                                <label class="switch">
                                                    <input type="checkbox" data-status="{{ $adminrole->pivot->status }}"
                                                    data-groupid="{{ $admingroup->id }}" data-roleid="{{ $adminrole->id }}" class="switch-input update_status"
                                                        {{ $adminrole->pivot->status == 1 ? 'checked' : '' }}>
                                                    <span class="slider-switch round"></span>
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">

                                    @foreach ($admingroup->permissions()->where('name','like','%patient%')->get() as $adminrole)
                                        <div class="form-group m-form__group row">

                                            <label class="col-lg-2 col-form-label">
                                                {{ $adminrole->name }}
                                            </label>
                                            <div class="col-lg-10 checkbox_div">

                                                <label class="switch">
                                                    <input type="checkbox" data-status="{{ $adminrole->pivot->status }}"
                                                    data-groupid="{{ $admingroup->id }}" data-roleid="{{ $adminrole->id }}" class="switch-input update_status"
                                                        {{ $adminrole->pivot->status == 1 ? 'checked' : '' }}>
                                                    <span class="slider-switch round"></span>
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>



                                <div class="tab-pane" id="m_tabs_2_6" role="tabpanel">

                                    @foreach ($admingroup->permissions()->where('name','like','%groups%')->get() as $adminrole)
                                        <div class="form-group m-form__group row">

                                            <label class="col-lg-2 col-form-label">
                                                {{ $adminrole->name }}
                                            </label>
                                            <div class="col-lg-10 checkbox_div">

                                                <label class="switch">
                                                    <input type="checkbox" data-status="{{ $adminrole->pivot->status }}"
                                                    data-groupid="{{ $admingroup->id }}" data-roleid="{{ $adminrole->id }}" class="switch-input update_status"
                                                        {{ $adminrole->pivot->status == 1 ? 'checked' : '' }}>
                                                    <span class="slider-switch round"></span>
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="tab-pane" id="m_tabs_2_7" role="tabpanel">

                                    @foreach ($admingroup->permissions()->where('name','like','%setting%')->get() as $adminrole)
                                        <div class="form-group m-form__group row">

                                            <label class="col-lg-2 col-form-label">
                                                {{ $adminrole->name }}
                                            </label>
                                            <div class="col-lg-10 checkbox_div">

                                                <label class="switch">
                                                    <input type="checkbox" data-status="{{ $adminrole->pivot->status }}"
                                                    data-groupid="{{ $admingroup->id }}" data-roleid="{{ $adminrole->id }}" class="switch-input update_status"
                                                        {{ $adminrole->pivot->status == 1 ? 'checked' : '' }}>
                                                    <span class="slider-switch round"></span>
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>



                            </div>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
@section('script')
<script type="text/javascript">
    $('.check_all').click(function () {
    $(this).parents(".checkbox_div").find('.input-check').prop('checked', this.checked);
 });



 $('.update_status').change(function() {

    if ($(this).is(":checked")) {
        var status = 1;
    } else {
        var status = 2;
    }

    var groupid = $(this).attr("data-groupid")
    var roleid = $(this).attr("data-roleid")
    //alert(id);
    $.ajax({
        url: "/admin/admingroup/update-status/" + groupid + "/" + roleid + "/" + status,
        success: function(e) {}
    });
});

</script>
@stop
