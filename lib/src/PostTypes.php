<?php

namespace Bluecadet\Utils;

/**
 * Create Custom Post Types
 *
 * @package BluecadetUtils
 * @since  1.0.0
 *
 */
class PostTypes {

  public function __construct() {
    add_action('init', [$this, 'Register_CPTs']);
  }

  /**
   * Register Custom Post Types
   * --------------------------
   *
   */
  public function Register_CPTs() {

    // START bc_utils_jawn
    // Example, repeat for each custom post type you want to add
    // @link https://developer.wordpress.org/reference/functions/register_post_type/
    $labels = new LabelMaker('BC Utils Jawn');
    $labels = $labels->labels;

    $args = array(
      'label'                 => $labels['name'],
      'labels'                => $labels,
      'supports'              => ['title', 'editor'],
      'taxonomies'            => [],
      'hierarchical'          => true,
      'public'                => true,
      'menu_position'         => 20,
      'menu_icon'             => 'dashicons-admin-page',
      'has_archive'           => true,
      'show_in_nav_menus'			=> true,
      // 'show_in_rest'          => true,
    );

    register_post_type( 'bc_utils_jawn', $args );
    // END bc_utils_jawn

  }

}

new PostTypes;

