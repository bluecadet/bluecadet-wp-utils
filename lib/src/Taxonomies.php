<?php

namespace Bluecadet\Utils;

/**
 * Create Custom Taxonomies
 * For settings, refer to http://generatewp.com/taxonomy/
 * Multiple Taxonomies can be added to this function
 *
 * @package BluecadetUtils
 * @since  1.0.0
 */
class Taxonomies {

  public function __construct() {
    // Register Taxonomies
    add_action( 'init', [$this, 'Register_Taxonomies'] );

    // Move Taxonomies to menu locations if desired
    // add_action( 'admin_menu', [$this, 'Register_Taxonomies_As_Menu_Items'] );
  }

  /**
   * Register Custom Taxonomies
   * --------------------------
   *
   */
  public function Register_Taxonomies() {

    // START bc_utils_jawn_taxonomy
    // Example, repeat for each custom taxonomy you want to add
    // @link https://developer.wordpress.org/reference/functions/register_taxonomy/
    $labels = new LabelMaker('BC Utils Jawn');
    $labels = $labels->labels;

    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
    );

    register_taxonomy( 'bc_utils_jawn_taxonomy', ['bc_utils_jawn'], $args );
    // END bc_utils_jawn_taxonomy

  }

  public function Register_Taxonomies_As_Menu_Items() {

    add_menu_page(
      'BC Utils Jawn Taxonomy',
      'BC Utils Jawn Taxonomy',
      'manage_options',
      'edit-tags.php?taxonomy=bc-utils-jawn-taxonomy',
      '',
      'dashicons-list-view',
      21
    );

  }
}

new Taxonomies;