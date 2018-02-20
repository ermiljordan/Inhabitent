<?php
/**
 * Template for single page: Adventure
 *
 * @package Inhabitent_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'full' );?>
		<?php endif; ?>
	</section>
	<section class="entry">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-header">', '</h1>' ); ?>
			<div class="entry-meta">
				<p class="text-uppercase"><?php inhabitent_posted_by(); ?></p>
			</div>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php 
				wp_link_pages( array (
					'before'	=>	'<div class="page-links">' . esc_html( 'Pages:' ),
					'after'		=>	'</div>'
				));
				?>
				<div class="social-media-section">
        	<button class="social-media-btn text-uppercase"><i class="fa fa-facebook" aria-hidden="true"></i> like</button>
        	<button class="social-media-btn text-uppercase"><i class="fa fa-twitter" aria-hidden="true"></i> tweet</button>
          <button class="social-media-btn text-uppercase"><i class="fa fa-pinterest" aria-hidden="true"></i> pin</button>
        </div>
		</div>
	</section>
</article>
		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
