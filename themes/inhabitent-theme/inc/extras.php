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

// THIS WILL PULL THE IMAGE ON THE FRONT PAGE
// function inhabitent_hero_banner() {
// 	if ( ! is_page_templates ( 'front-page.php ') ) {
// 		return;
// 	}
// }
// $image = CFS() ->get( 'hero_banner' );
// if (! $image )  {
// 	return;
// }

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