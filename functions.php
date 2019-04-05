<?php  
function resources(){
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('style-name', get_stylesheet_uri());
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
	wp_enqueue_style('viewport', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css');
	wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style('owlthemedefault', get_template_directory_uri() . '/css/owl.theme.default.css');
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'viewportjs', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'owljs', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
}

add_action('wp_enqueue_scripts', 'resources');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}

function setup(){
		//Navigation Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'firm' => __('Firm Menu'),
		'quicklinks' => __('Quick Links Menu'),
		'clients' => __('Clients Menu')
	));
		//Add featured image support
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'setup');

if (class_exists('MultiPostThumbnails')) {
	
	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'post'
	) );
	
}

function get_link_by_slug($slug, $type = 'post'){
	$post = get_page_by_path($slug, OBJECT, $type);
	return get_permalink($post->ID);
}

function change_wp_search_size($queryVars) {
	if ( isset($_REQUEST['s']) ) // Make sure it is a search page
		$queryVars['posts_per_page'] = 1000; // Change 10 to the number of posts you would like to show
	return $queryVars; // Return our modified query variables
}
add_filter('request', 'change_wp_search_size'); // Hook our custom function onto the request filter
?>