/**
 * ApsysChartDrawer wrapper object.
 */
var ApsysChartDrawer = function($, Drupal) {

  /**
   * The chart drawer object.
   *
   * @param charts
   *   An array of chart data that comes from the back-end.
   */
  function ApsysChartDrawer(charts) {
    this.charts = charts;
  }

  ApsysChartDrawer.prototype = {
    draw: function () {
      $.each(this.charts, function( index, value ) {
        if (index === 'extra_votingapi_widgets_summary_pie_chart_block') {
          var ctx = document.getElementById(index);
          var sum = 0;
          var borderWidth = 9;
          $.each(value.values, function () {
            sum += parseInt(this);
          });
          $.each(value.values, function () {
            if (parseInt(this) === sum) {
              borderWidth = 0;
            }
          });

          data = {
            datasets: [{
              data: value.values,
              backgroundColor: [
                '#18a1de', '#15ac82', '#fcdf2c'
              ],
              borderWidth: borderWidth,
              hoverBorderColor: "#ffffff",
              hoverBorderWidth: borderWidth
            }],
            labels: value.keys
          };
          var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
              responsive: true,
              legend: {
                display: false
              },
              cutoutPercentage: 68
            }
          });
        }
        else {
          var options = value.options;
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Category');
          data.addColumn('number', 'Number');

          var chart = new google.visualization.PieChart(document.getElementById(index));
          var chartObject = new ApsysChart(value.distribution);
          chartObject.processChartResults();

          data.addRows(chartObject.getRows());
          chart.draw(data, options);
        }
      });
    }
  };

  return ApsysChartDrawer;
}(jQuery, Drupal);
