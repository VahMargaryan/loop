<?php

/**
 * @file
 * Post update functions for Event module.
 */

declare(strict_types=1);

use Drupal\Core\Entity\EntityStorageException;
use Drupal\taxonomy\Entity\Term;


/**
 * Add terms to Artist taxonomy.
 */
//function event_post_update_create_artists(&$sandbox) {
//
//  // Define the artist data
//  $artists_data = [
//    [
//      'name' => 'Michael Jackson',
//      'genre' => 'Pop',
//      'nationality' => 'American',
//      'albums' => 10,
//      'active' => 0,
//    ],
//    [
//      'name' => 'The Beatles',
//      'genre' => 'Rock',
//      'nationality' => 'British',
//      'albums' => 12,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Madonna',
//      'genre' => 'Pop',
//      'nationality' => 'American',
//      'albums' => 14,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Elvis Presley',
//      'genre' => 'Rock and Roll',
//      'nationality' => 'American',
//      'albums' => 23,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Beyoncé',
//      'genre' => 'R&B',
//      'nationality' => 'American',
//      'albums' => 6,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Queen',
//      'genre' => 'Rock',
//      'nationality' => 'British',
//      'albums' => 15,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Bob Dylan',
//      'genre' => 'Folk',
//      'nationality' => 'American',
//      'albums' => 39,
//      'active' => 1,
//    ],
//    [
//      'name' => 'David Bowie',
//      'genre' => 'Rock',
//      'nationality' => 'British',
//      'albums' => 27,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Rihanna',
//      'genre' => 'R&B',
//      'nationality' => 'Barbadian',
//      'albums' => 8,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Prince',
//      'genre' => 'Pop',
//      'nationality' => 'American',
//      'albums' => 39,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Eminem',
//      'genre' => 'Hip Hop',
//      'nationality' => 'American',
//      'albums' => 11,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Pink Floyd',
//      'genre' => 'Progressive Rock',
//      'nationality' => 'British',
//      'albums' => 15,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Adele',
//      'genre' => 'Pop',
//      'nationality' => 'British',
//      'albums' => 3,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Led Zeppelin',
//      'genre' => 'Rock',
//      'nationality' => 'British',
//      'albums' => 9,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Taylor Swift',
//      'genre' => 'Pop',
//      'nationality' => 'American',
//      'albums' => 10,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Metallica',
//      'genre' => 'Heavy Metal',
//      'nationality' => 'American',
//      'albums' => 10,
//      'active' => 1,
//    ],
//    [
//      'name' => 'Johnny Cash',
//      'genre' => 'Country',
//      'nationality' => 'American',
//      'albums' => 96,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Nirvana',
//      'genre' => 'Grunge',
//      'nationality' => 'American',
//      'albums' => 3,
//      'active' => 0,
//    ],
//    [
//      'name' => 'Whitney Houston',
//      'genre' => 'R&B',
//      'nationality' => 'American',
//      'albums' => 7,
//      'active' => 0,
//    ],
//    [
//      'name' => 'The Rolling Stones',
//      'genre' => 'Rock',
//      'nationality' => 'British',
//      'albums' => 30,
//      'active' => 1,
//    ],
//  ];
//
//  // Process each artist
//  foreach ($artists_data as $artist) {
//    // Check if the artist already exists
//    $terms = \Drupal::entityTypeManager()
//      ->getStorage('taxonomy_term')
//      ->loadByProperties(['vid' => 'artist', 'name' => $artist['name']]);
//
//    if (empty($terms)) {
//      // No term found, create a new one
//      $term = Term::create([
//        'vid' => 'artist',
//        'name' => $artist['name'],
//        'field_artist_genre' => ['value' => $artist['genre']],
//        'field_artist_nationality' => ['value' => $artist['nationality']],
//        'field_artist_albums' => ['value' => $artist['albums']],
//        'field_artist_active' => ['value' => $artist['active']],
//      ]);
//
//      try {
//        $term->save();
//        \Drupal::messenger()
//          ->addMessage('Created artist term: ' . $artist['name']);
//      } catch (EntityStorageException $e) {
//        \Drupal::logger('event')
//          ->error('Failed to save term for artist: ' . $artist['name'] . ' - Error: ' . $e->getMessage());
//      }
//    }
//    else {
//      \Drupal::messenger()
//        ->addMessage('Artist already exists: ' . $artist['name']);
//    }
//  }
//
//  return t('Processed all artist terms.');
//}
