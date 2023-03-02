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

// Enqueue scripts
function add_js () {

	//Register scripts

		wp_register_script( 'bt-main.js', get_template_directory_uri(  ) . '/assets/js/main.js', array(), '0.1', true);
		wp_register_script( 'bt-404.js', get_template_directory_uri(  ) . '/assets/js/404.js', array(), '0.1', true);
		wp_register_script( 'bt-attachment.js', get_template_directory_uri(  ) . '/assets/js/attachment.js', array(), '0.1', true);
		wp_register_script( 'bt-author.js', get_template_directory_uri(  ) . '/assets/js/author.js', array(), '0.1', true);
		wp_register_script( 'bt-category.js', get_template_directory_uri(  ) . '/assets/js/category.js', array(), '0.1', true);
		wp_register_script( 'bt-comments.js', get_template_directory_uri(  ) . '/assets/js/comments.js', array(), '0.1', true);
		wp_register_script( 'bt-date.js', get_template_directory_uri(  ) . '/assets/js/date.js', array(), '0.1', true);
		wp_register_script( 'bt-footer.js', get_template_directory_uri(  ) . '/assets/js/footer.js', array(), '0.1', true);
		wp_register_script( 'bt-header.js', get_template_directory_uri(  ) . '/assets/js/header.js', array(), '0.1', true);
		wp_register_script( 'bt-page.js', get_template_directory_uri(  ) . '/assets/js/page.js', array(), '0.1', true);
		wp_register_script( 'bt-single.js', get_template_directory_uri(  ) . '/assets/js/single.js', array(), '0.1', true);
		wp_register_script( 'bt-tag.js', get_template_directory_uri(  ) . '/assets/js/tag.js', array(), '0.1', true);

		wp_register_script( 'bootstrap', get_template_directory_uri(  ) . '/assets/js/bootstrap/bootstrap.min.js', 'jquery', '0.1', true);
		wp_enqueue_script('bootstrap');
	
	//Conditionally load on certain page

	if (is_front_page()) {
		wp_enqueue_script( 'bt-main.js' );
	};

	if (is_404()) {
		wp_enqueue_script( 'bt-404.js' );
	};

	if (is_attachment()) {
		wp_enqueue_script( 'bt-attachment.js' );
	};

	if (is_author()) {
		wp_enqueue_script( 'bt-author.js' );
	};

	if (is_category()) {
		wp_enqueue_script( 'bt-category.js' );
	};

	if (is_comments()) {
		wp_enqueue_script( 'bt-comments.js' );
	};

	if (is_date()) {
		wp_enqueue_script( 'bt-date.js' );
	};

	if (is_footer()) {
		wp_enqueue_script( 'bt-footer.js' );
	};

	if (is_header()) {
		wp_enqueue_script( 'bt-header.js' );
	};

	if (is_page()) {
		wp_enqueue_script( 'bt-page.js' );
	};

	if (is_single()) {
		wp_enqueue_script( 'bt-single.js' );
	};

	if (is_tag()) {
		wp_enqueue_script( 'bt-tag.js' );
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

//Add stylesheet for login page
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/js/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );