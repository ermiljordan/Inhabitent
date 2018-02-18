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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
