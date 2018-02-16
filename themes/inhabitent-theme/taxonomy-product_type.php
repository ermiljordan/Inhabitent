<?php
/**
 * The template for displaying archive pages.
 *
 * @package Inhabitent_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

      <?php /* Start the Loop */ ?>
      <section class="flex-container">
      <?php while ( have_posts() ) : the_post(); ?>
      
        <div class="product-post">
          <?php if( has_post_thumbnail() ); ?>
          <a href="<?php echo get_post_permalink() ?>"><div class="product-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div></a>


        </div>

				<?php
					get_template_part( 'template-parts/content' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
