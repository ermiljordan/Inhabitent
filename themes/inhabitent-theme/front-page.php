<?php
/**
 * Template page for home
 *
 * @package Inhabitent_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="hero-banner">
				<img class="logo-circle" src="<?php echo get_template_directory_uri(); ?>/assets/logos/inhabitent-logo-full.svg" alt="Inhabitent Camping Supply Co.">
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<!-- section for shop stuff -->
<section>
	<h2>Shop Stuff</h2>
	<div>
	<?php $terms = get_terms('product_type');
		foreach ( $terms as $term ) {
	?>
	<?php 
		$url = get_term_link($term->slug, 'product_type');
	?>
	<div>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/product-type-icons/<?php echo $term->slug ?>.svg">
		<p><?php echo $term->description ?></p>
		<p><a href="<?php echo $url ?>"><?php echo $term->name.''; ?></a></p>
	</div>
		<?php
		}
		?>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
