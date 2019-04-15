@extends('layouts.master')

@section('content')
<div class="row">
    @include('sidebar.sidebar')
    <div class="col-md-9">
        <div class="panel panel-success">
            <div class="panel-heading">
                Dashboard
            </div>
            <div class="panel-body">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="panel-footer text-center">Developed by <a href="#">Buildit.com.ng</a></div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script type="text/javascript">
        <?php
              echo "var departments = ". $all_data . ";\n";
              echo "var today = '". date("M d, Y",strtotime(date("Y-m-d"))) ."';\n";
        ?>
        console.log(departments);
        //HICHART BEGINS

          // © 2017 Highcharts. All rights reserved.
              
          // LOADING...

        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'All Departments With Total Students Respectively'
            },
            subtitle: {
                text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total Percentage of Students By Department'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> total students<br/>'
            },

            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: departments
            }],
            drilldown: {
                series: [departments]
            },
            credits : false
        });
    </script>
@endsection