<?php
/*
 * Defines custom poste_types
 *
 */

// register_post_type( 'realisations', [
//     'label' => 'Réalisations',
//     'labels' => [
//             'singular_name' => 'Réalisation',
//             'add_new' => 'Ajouter une nouvelle réalisation'
//         ],
//     'description' => 'La liste de toutes les réalisation que j\'ai faites',
//     'public' => true,
//     'menu_position' => 5,
//     'menu_icon' => 'dashicons-editor-paste-word',
//     'supports' => [ 'title', 'author', 'thumbnail' ],
//     'taxonomies' => [ 'Design', 'Refonte', 'Développement', 'Wordpress', 'PHP', 'JavaScript' ],
//     'has_archive' => true
//     ] );

/*
 * get caption from media
 *
 */

 function the_post_thumbnail_caption() {
   global $post;

   $thumbnail_id    = get_post_thumbnail_id($post->ID);
   $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

   if ($thumbnail_image && isset($thumbnail_image[0])) {
     echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
   }
 }

 /*
  * Récupérer l'URL des thumbnails
  *
  */

 add_theme_support( 'post-thumbnails' );
  // register_post_type( $post_type, $args );
