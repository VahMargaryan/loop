<?php

namespace Drupal\event\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\link\Plugin\Field\FieldWidget\LinkWidget;

/**
 * Plugin implementation of the 'link_target_field_widget'.
 *
 * Provides a widget for link fields with the ability to select the link target
 * attribute, allowing links to open in the same or a new window.
 *
 * @FieldWidget(
 *   id = "link_target_field_widget",
 *   label = @Translation("Link with Target"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class LinkTargetFieldWidget extends LinkWidget {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return parent::defaultSettings();
  }

  /**
   * Provides an array of target options for link targets.
   *
   * @return array
   *   An associative array where keys are the HTML 'target' attribute values and
   *   values are the translated descriptions.
   */
  public static function getTargets() {
    return [
      '_self' => t('Current window'),
      '_blank' => t('New window'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $formState) {
    $element = parent::formElement($items, $delta, $element, $form, $formState);
    $item = $this->getLinkItem($items, $delta);
    $options = $item->get('options')->getValue();
    $targetsAvailable = $this->getTargets();

    $defaultValue = !empty($options['attributes']['target']) ? $options['attributes']['target'] : '';
    $element['options']['attributes']['target'] = [
      '#type' => 'select',
      '#title' => $this->t('Select a Target'),
      '#options' => ['' => $this->t('- None -')] + $targetsAvailable,
      '#default_value' => $defaultValue,
      '#description' => $this->t('Select a link target. <em>Current window</em> will open the link in the current window. <em>New window</em> will open the link in a new window or tab.'),
    ];

    return $element;
  }

  /**
   * Retrieves a link item from a field list.
   *
   * @param FieldItemListInterface $items
   *   The field items list.
   * @param string $delta
   *   The delta (index) of the item in the field list.
   *
   * @return \Drupal\link\LinkItemInterface
   *   The link item interface.
   */
  private function getLinkItem(FieldItemListInterface $items, $delta) {
    return $items[$delta];
  }
}
