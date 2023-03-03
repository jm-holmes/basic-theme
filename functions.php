<?php

//Enqueue styles
function add_css () {

		wp_register_style( 'bootstrap', get_template_directory_uri(  ) . '/assets/css/bootstrap/bootstrap.min.css', array (), false, 'all' );
		wp_enqueue_style( 'bootstrap' );

		wp_enqueue_style('jquery');

		wp_register_style('style', get_template_directory_uri() . '/assets/css/main.css', array(), false, 'all');
		wp_enqueue_style('style');
}

add_action( 'wp_enqueue_scripts', 'add_css' );

//js files

function add_js () {

		if(is_front_page()) {
			wp_enqueue_script('js-main', get_template_directory_uri(  ) . '/assets/js/main.js', array(), '', false);
		};
		if(is_author()) {
			wp_enqueue_script('js-author', get_template_directory_uri(  ) . '/assets/js/author.js', array(), '', false);
		};
		if(is_404()) {
			wp_enqueue_script('js-404', get_template_directory_uri(  ) . '/assets/js/404.js', array(), '', false);
		};
		if(is_category()) {
			wp_enqueue_script('js-category', get_template_directory_uri(  ) . '/assets/js/category.js', array(), '', false);
		};
		if(is_date()) {
			wp_enqueue_script('js-date', get_template_directory_uri(  ) . '/assets/js/date.js', array(), '', false);
		};
		if(is_page()) {
			wp_enqueue_script('js-page', get_template_directory_uri(  ) . '/assets/js/page.js', array(), '', false);
		};
		if(is_single()) {
			wp_enqueue_script('js-single', get_template_directory_uri(  ) . '/assets/js/single.js', array(), '', false);
		};
		if(is_tag()) {
			wp_enqueue_script('js-tage', get_template_directory_uri(  ) . '/assets/js/tag.js', array(), '', false);
		};

}
add_action( 'wp_enqueue_scripts', 'add_js');





// Register menu location ***EDIT THEME_NAME if required***
register_nav_menus(array(
    'top-menu' => __('Top Menu', 'custom_theme'),
    //'mobile-menu' => __( 'Mobile Menu', 'custom_theme' ),
));



// Image sizes
//add_image_size('custom_image', 800, 800, false);

// Theme support
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');


// Register sidebars

// function my_sidebars()
// {

//             register_sidebar(

//                 [
//                   'name' => 'Footer',
//                   'id' => 'footer',
//                   'before_title' => '<h4 class="widget-title">',
//                   'after_title' => '</h4>',
//                 ]

//             );

// }
// add_action('widgets_init', 'my_sidebars');

// Declare WooCommerce support
// add_theme_support('woocommerce');
// add_theme_support( 'wc-product-gallery-zoom' );
// add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );


// Remove WordPress version meta in header scripts
remove_action('wp_head', 'wp_generator');


// Remove WordPress Emojicons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


// Remove classes and widths from images in content editor
function remove_width_attribute($html)
{
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}
add_filter('get_image_tag_class', '__return_empty_string');
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);



// // Custom Post Type
// function custom_post_type()
// {

//     $args = array(
        
//         'public' => true,
//         'has_archive' => true,
//         'supports' => array('title','editor','thumbnail','revisions'),
//         //'rewrite' => array('slug' => 'news'),
//         'hierarchical' => true,
//         'labels' => array(
//             'name' => 'News',
//             'singular_name' => 'News Item',
//             //'add_new_item' => 'Add News item',
//             //..'not_found' => 'No news found'
//         ),
//         'menu_icon' => 'dashicons-format-aside',

//     );

//     register_post_type('news', $args);

// }
// add_action('init', 'custom_post_type');





// // Custom Taxonomy
// function custom_taxonomy()
// {


//     $args = array(
        
      
//         'labels' => array(
//             'name' => 'News Categories',
//             'singular_name' => 'News Category',
//             //'add_new_item' => 'Add News item',
//             //..'not_found' => 'No news found'
//         ),
//         'hierarchical' => true,
//         'menu_icon' => 'dashicons-format-aside',

//     );

//     register_taxonomy('news-category', array('news'), $args);

// }
// add_action('init', 'custom_taxonomy');


//Custom Login Screen

//Logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height: auto;
			width: auto;
			background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//Login Link Values - links logo to site
/*function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );
*/

