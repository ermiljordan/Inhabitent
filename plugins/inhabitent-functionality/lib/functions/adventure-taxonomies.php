<?php
// Register Custom Taxonomy
function adventure_inhabitent() {

	$labels = array(
		'name'                       => 'adventures',
		'singular_name'              => 'adventure',
		'menu_name'                  => 'adventure',
		'all_items'                  => 'All adventure',
		'parent_item'                => 'Parent adventure',
		'parent_item_colon'          => 'Parent adventure:',
		'new_item_name'              => 'New adventure Name',
		'add_new_item'               => 'Add New adventure',
		'edit_item'                  => 'Edit adventure',
		'update_item'                => 'Update adventure',
		'view_item'                  => 'View adventure',
		'separate_items_with_commas' => 'Separate adventures with commas',
		'add_or_remove_items'        => 'Add or remove adventures',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular adventures',
		'search_items'               => 'Search adventures',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No adventures',
		'items_list'                 => 'adventures list',
		'items_list_navigation'      => 'adventures list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'adventure', array( 'post' ), $args );

}
add_action( 'init', 'adventure_inhabitent', 0 );