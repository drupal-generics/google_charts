<?php

namespace Drupal\google_charts\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Class GoogleChartBlockBase.
 *
 * @package Drupal\google_charts\Block
 */
abstract class GoogleChartBlockBase extends BlockBase implements GoogleChartBlockInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [
      '#theme' => 'google_chart',
      '#id' => $this->getPluginId(),
      '#values' => $this->getData(),
      '#votes_nr' => $this->getTotalNrOfVotes($this->getChartValues($this->getData()))
    ];

    return $build + $this->getAttachments();
  }

  /**
   * Adds attachments to the render array.
   *
   * @return array
   *   The render array.
   */
  private function getAttachments() {
    $build['#attached']['drupalSettings']['charts'][$this->getPluginId()]['options'] = $this->getOptions();
    $build['#attached']['drupalSettings']['charts'][$this->getPluginId()]['distribution'] = $this->getData();
    $build['#attached']['drupalSettings']['charts'][$this->getPluginId()]['keys'] = $this->getChartOptions($this->getData());
    $build['#attached']['drupalSettings']['charts'][$this->getPluginId()]['values'] = $this->getChartValues($this->getData());
    $build['#attached']['library'][] = 'google_charts/google_charts';

    return $build;
  }

  /**
   * Get the values from the voting results.
   *
   * @param object $datas
   *   The voting results.
   *
   * @return array
   *   The values.
   */
  private function getChartValues($datas) {
    $values = [];
    foreach ($datas as $key => $value) {
      $values[] = $value;
    }

    return $values;
  }

  /**
   * Get the options from the voting results.
   *
   * @param object $datas
   *   The voting results.
   *
   * @return array
   *   The values.
   */
  private function getChartOptions($datas) {
    $keys = [];
    foreach ($datas as $key => $value) {
      $keys[] = $key;
    }

    return $keys;
  }

  /**
   * The total number of votes.
   *
   * @param array $votes
   *   The all votes.
   *
   * @return int
   *   The total number of votes.
   */
  private function getTotalNrOfVotes(array $votes) {
    $value = 0;
    foreach ($votes as $vote) {
      $value = $value + $vote;
    }

    return $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getOptions() {
    return [
      'title' => $this->getTitle(),
      'width' => 800,
      'height' => 300,
    ];
  }

}
