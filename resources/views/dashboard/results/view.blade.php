@extends('dashboard.layouts.app')
@section('content')
    <style media="print">
        @page {
            size: auto;
            margin: 0;
        }
    </style>

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg" id="headerdiv">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Results </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">

                            <p><button onclick="printDiv('printdiv')" class="btn btn-brand btn-elevate btn-icon-sm"
                                    id="printpagebutton">Print</button></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" id="printdiv">


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Patient :</th>
                            <td>Ramy Ahmed Ahmed</td>
                        </tr>
                        <tr>
                            <th>Doctor :</th>
                            <td>wafaa Chief Doctor Surgeon , Cardiologist</td>
                        </tr>

                        <tr>
                            <th>Ear Side :</th>
                            <td> LEFT EAR </td>
                        </tr>



                        <?php     <tr>
                            <th>Level :</th>
                            <td>Track 1</td>
                        </tr>

                        <tr>
                            <th>Test Date :</th>
                            <td>2021-04-17 15:06:42</td>
                        </tr>
                        <tr>
                            <th>Test Start Time :</th>
                            <td>2021-04-17 15:06:42</td>
                        </tr>
                        <tr>
                            <th>Test End Time :</th>
                            <td>2021-04-17 15:06:44</td>
                        </tr>

                        <tr>
                            <th>Total Questions :</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Total Answers :</th>
                            <td>6</td>
                        </tr>

                        <tr>
                            <th>Score :</th>
                            <td>
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:60%">60%</div>
                            </td>

                        </tr>
                    </thead>
                </table>

                <h3>A&Q</h3>

                <div>
                    <br>Question 1 : وين البنت
                    <span>

                        <span class="badge badge-success"> <i class="flaticon2-checkmark"></i></span>


                        <span class="badge badge-warning"> <i class="flaticon2-delete"></i></span>

                        <span class="badge badge-danger"> <i class="flaticon2-delete"></i></span>

                    </span>
                </div>


            </div>
        </div>
    </div>

    <!-- end:: Content -->
    </div>


@stop
@section('script')

    <script type="text/javascript">
        function printDiv(divName) {
            //  alert('GI');
            var printContents = document.getElementById(divName);
            printContents.style.visibility = 'hidden';
            headerdiv.style.visibility = 'hidden';
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents.innerHTML;
            window.print();
            document.body.innerHTML = originalContents;
            printContents.style.visibility = 'visible';




        }
    </script>



@stop
