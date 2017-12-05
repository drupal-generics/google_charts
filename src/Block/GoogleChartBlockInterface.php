<?php

namespace Drupal\google_charts\Block;

/**
 * Interface GoogleChartBlockInterface.
 *
 * @package Drupal\google_charts\Block
 */
interface GoogleChartBlockInterface {

  /**
   * Returns data for the pie chart.
   *
   * @return mixed
   *   An object containing the data.
   */
  public function getData();

  /**
   * The name of the pie chart.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   *   A translated string.
   */
  public function getTitle();

  /**
   * Returns options for the pie chart.
   *
   * @return array
   *   An associative array containing the options.
   */
  public function getOptions();

}
