<?php

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

/*
*
* générate navigaiton
*
*/

register_nav_menu( 'main-nav', 'Menu principal' );
register_nav_menu( 'map-nav', 'Menu du plan du site' );

/*
*
* générate a custom menu array
*
*/
function pf_get_menu_id( $location ){
  $locations = get_nav_menu_locations();
  if ( isset( $locations[ $location ] ) ) {
      return $locations[ $location ];
  }
  return false;
}

function pf_is_current( $obj ) {
  global $post;
  return ( $obj -> object_id == $post -> ID );
}

function pf_get_menu_items( $location ) {

  $navItems = [];
  foreach ( wp_get_nav_menu_items( pf_get_menu_id( $location ) ) as $obj) {
      $item = new stdClass();
      $item -> isCurrent = pf_is_current( $obj );
      $item -> url = $obj -> url;
      $item -> label = $obj -> title;
      $item -> icon = $obj -> classes[0];
      array_push( $navItems, $item );
  }
  // var_dump( $navItems ); die();
  return $navItems;
}
