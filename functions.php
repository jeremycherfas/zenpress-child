<?php
function my_theme_enqueue_styles() {

    $parent_style = 'zenpress-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );


}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



function unspam_webmentions($approved, $commentdata) {
  return $commentdata['comment_type'] == 'webmention' ? 1 : $approved;
}

add_filter('pre_comment_approved', 'unspam_webmentions', '99', 2);

/* Change default dimensions of header image */
/* from miklb */

    function zenpress_setup()
    {

        $fornacalia_header_args = array(
            'width'       => 1024,
            'height'      => 350,
            'header-text' => true,
        );
  
        add_theme_support('custom-header', $fornacalia_header_args);

  }
/* un zenpress_setup() when the 'after_setup_theme' hook is run */

add_action('after_setup_theme', 'zenpress_setup');

?>
