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
                    Results </h3>
            </div>

        </div>
        <div class="kt-portlet__body">


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


            <form method="GET" action="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="month" class="form-control">
                                <option value="">Select Month</option>

                                <option value='1' <?php echo @$_GET['month'] == 1 ? "selected" : ""; ?>>Janaury</option>
                                <option value='2' <?php echo @$_GET['month'] == 2 ? "selected" : ""; ?>>February</option>
                                <option value='3' <?php echo @$_GET['month'] == 3 ? "selected" : ""; ?>>March</option>
                                <option value='4' <?php echo @$_GET['month'] == 4 ? "selected" : ""; ?>>April</option>
                                <option value='5' <?php echo @$_GET['month'] == 5 ? "selected" : ""; ?>>May</option>
                                <option value='6' <?php echo @$_GET['month'] == 6 ? "selected" : ""; ?>>June</option>
                                <option value='7' <?php echo @$_GET['month'] == 7 ? "selected" : ""; ?>>July</option>
                                <option value='8' <?php echo @$_GET['month'] == 8 ? "selected" : ""; ?>>August</option>
                                <option value='9' <?php echo @$_GET['month'] == 9 ? "selected" : ""; ?>>September</option>
                                <option value='10' <?php echo @$_GET['month'] == 10 ? "selected" : ""; ?>>October</option>
                                <option value='11' <?php echo @$_GET['month'] == 11 ? "selected" : ""; ?>>November</option>
                                <option value='12' <?php echo @$_GET['month'] == 12 ? "selected" : ""; ?>>December</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <select name="year" class="form-control">
                            <option value="">Select Year</option>
                            <option value="2018" <?php echo @$_GET['year'] == 2018 ? "selected" : ""; ?>>2018</option>
                            <option value="2019" <?php echo @$_GET['year'] == 2019 ? "selected" : ""; ?>>2019</option>
                            <option value="2020" <?php echo @$_GET['year'] == 2020 ? "selected" : ""; ?>>2020</option>
                            <option value="2021" <?php echo @$_GET['year'] == 2021 ? "selected" : ""; ?>>2021</option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="patient" class="form-control">
                            <option value="">Select Patient</option>


                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="result_range" class="form-control">
                            <option value="">Select Range</option>
                            <option value="0-20" <?php echo @$_GET['result_range'] == "0-20 " ? "selected" : ""; ?>>0-20%</option>
                            <option value="21-40" <?php echo @$_GET['result_range'] == "21-40" ? "selected" : ""; ?>>21-40%</option>
                            <option value="41-60" <?php echo @$_GET['result_range'] == "41-60" ? "selected" : ""; ?>>41-60%</option>
                            <option value="61-80" <?php echo @$_GET['result_range'] == "61-80" ? "selected" : ""; ?>>61-80%</option>
                            <option value="81-100" <?php echo @$_GET['result_range'] == "81-100" ? "selected" : ""; ?>>81-100%</option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-info" type="submit"> Filter</button>
                    </div>

                </div>
            </form>


            <table class=" table table-striped table-bordered" id="dataTables">
                <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Doctor</th>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Level</th>
                        <th>Ear side</th>
                        <th>Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                            <tr>
                                <td>1</td>
                                <td> 	wafaa Chief Doctor Surgeon , Cardiologist</td>
                                <td>Ramy Ahmed Ahmed</td>

                                <td>2021-04-17 15:06:42</td>
                                <td>LEFT EAR</td>
                                <td>track 1</td>
                                <td>60</td>

                                <td>
                                    <a href="" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" onclick="return  confirm('are you sure?');"><i class="fa fa-trash"></i></a>

                                </td>

                            </tr>

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
@stop
