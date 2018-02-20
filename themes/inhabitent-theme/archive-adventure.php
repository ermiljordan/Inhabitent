<?php
/**
 * The template for displaying archive adventure pages.
 *
 * @package Inhabitent_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    <?php query_posts( array( 'post_type' =>'adventure', 'orderby' => 'date', 'order' => 'ASC' ) ); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

 <section class="">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="">
          <div class="">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'large' ); ?>
            <?php endif; ?>
            <div class="">
              <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
              <a href=<?php echo get_post_permalink() ?> class="">read more</a>
            </div>
          </div>
        </div>
			<?php endwhile; ?>
      </section>
		<?php endif; ?>
		</main>
	</div>
	
<?php get_footer(); ?>