/**
 * @file
 * Handles the drawing of google charts.
 */

(function($, Drupal) {
  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {
    // Depends on chart_drawer.js
    var drawer = new ApsysChartDrawer(drupalSettings.charts);
    drawer.draw();
  }

}(jQuery, Drupal));
