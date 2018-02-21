<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Inhabitent_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

// This changes the Logo on the login.
function inhabitent_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/logos/inhabitent-logo-text-dark.svg);
			padding-bottom: 30px;
			background-size: 310px !important;
			width: 310px !important;
			background-position: bottom !important;
		}
	</style>
<?php }
add_filter('login_enqueue_scripts', 'inhabitent_login_logo');
add_filter('logo_headertitle', 'inhabitent_login_title');

//This will show thr hero banner
function inhabitent_hero_banners() {
	switch(true) {
		case is_page('About');
		$urlAbout = CFS()->get('header_image');
		$custom_css = "
		.about-hero-banner{
			background: url( {$urlAbout} ) no-repeat center bottom;
			backgound-size: cover;
		}";
		case is_page('Home');
		$urlHome = CFS()->get('');
		$custom_css = "
		.hero-banner{
			
		}";
		break;
		default:
		$custom_css = "";
		break;
	}
	wp_add_inline_style('tent_style', $custom_css);
}
add_action( 'wp_enqueue_scripts', 'inhabitent_hero_banners');


//This pull the product archive title //
function archive_product_title($title) {
	if(is_post_type_archive('product')) {
		$title = 'Shop Stuff';
	}elseif (is_post_type_archive('adventure_type')) {
		$title = 'Latest Adventures';
	}
	return $title;
}
add_filter('get_the_archive_title', 'archive_product_title');

//This will pull the amount of product that will show //
function inhabitent_limit_archive_posts($query) {
	if($query->is_archive){
		$query->set('posts_per_page', 16);
		$query->set('order', 'ASC');
	}
	return $query;
}
add_filter('pre_get_posts', 'inhabitent_limit_archive_posts');

//This will pull the archive for DO EAT SLEEP and WEAR 
function inhabitent_archive_title($title) {
	if(is_category() ) {
		$title = single_cat_title('', false);
	} elseif (is_tag() ) {
		$title = single_tag_title('', false);
	} elseif (is_tag() ) {
		$title = single_term_title('', false);
	}
	return $title;
}
add_filter ('get_the_archive_title', 'inhabitent_archive_title');

function new_excerpt_more($more) {
	global $post;
	return ' [...]<br/><a class="moretag" href="'. get_permalink($post->ID) . '">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
