<?php

namespace Drupal\event\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventApiController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new EventApiController.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * List events.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The response.
   */
  public function listEvents() {
    $query = $this->entityTypeManager->getStorage('event')
      ->getQuery()
      ->accessCheck(FALSE)
      ->sort('field_event_date', 'ASC');
    $ids = $query->execute();

    $events = $this->entityTypeManager->getStorage('event')->loadMultiple($ids);

    $data = [];
    foreach ($events as $event) {
      $data[] = [
        'title' => $event->get('label')->getString(),
        'date' => $event->get('field_event_date')->getString(),
        'description' => $event->get('field_event_description')->getString(),
        'website' => $event->get('field_event_website')->getString(),
        'location' => $event->get('field_event_location')->getString(),
        'organizer' => $event->get('field_event_organizer')->getString(),
      ];
    }

    return new JsonResponse($data);
  }

}
