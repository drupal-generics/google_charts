var ApsysChart = function ($, Drupal) {

  /**
   * The ApsysChart object.
   *
   * @param chartResults
   *   Contains an individual element of chart data.
   */
  function ApsysChart(chartResults) {
    this.rows = [];
    this.chartResults = chartResults;
  }

  ApsysChart.prototype = {
    constructor: ApsysChart,

    processChartResults: function () {
      var results = [];
      $.each(this.chartResults, function (index, value) {
        results.push([index, parseInt(value)]);
      });

      this.rows = results;
    },

    getRows: function() {
      return this.rows;
    }
  };

  return ApsysChart;
}(jQuery, Drupal);
