@if (isset($columns) && isset($values))
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        var columns = {!! json_encode($columns) !!};
        var values = {!! json_encode($values) !!};

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                columns, ...values
            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }

        //TODO: need lodash debounce
        window.addEventListener('resize', function() {
            drawChart();
        })
    </script>
@endif
