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
<section class="shop-stuff">
	<h2>Shop Stuff</h2>
	<div>
	<?php $terms = get_terms('product_type');
		foreach ( $terms as $term ) {
	?>
	<?php 
		$url = get_term_link($term->slug, 'product_type');
	?>
	<div class="hero-banner">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/product-type-icons/<?php echo $term->slug ?>.svg">
		<p><?php echo $term->description ?></p>
		<p><a href="<?php echo $url ?>"><?php echo $term->name.''; ?></a></p>
	</div>
		<?php
		}
		?>
	</div>
</section>
<!-- JOURNAL SECTION -->
<section class="journal">
	<h2>Inhabitent Journal</h2>
	<div>
		<?php 
			$args = array(
				'posts_per_page' 		=> 3,
				'orderby'						=> 'date',
				'order'							=> 'DESC',
				'post_type'					=> 'post',
				'post_status'				=> 'publish',
				'suppress_filters' 	=> true
			);
			?>
			<?php 
				$product_posts = get_posts( $args );
				?>
				<?php foreach ( $product_posts as $post ) : setup_postdata( $post ); ?>

			<div>
				<?php the_post_thumbnail( '' ); ?>

				<div>
					<p>
						<?php the_date(); ?>
						<?php $comments_count = wp_count_comments(); 
						echo $comments_count->approved . "Comments" ?>
					</p>

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<a class="read-more" href="?php the_permalink(); ?>">Read entry</a>
				</div>
			</div>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
</section>
<!-- Adventure Section -->
<section class="adventure">
	<h2 class="">Latest Adventures</h2>
		<?php 
			$args = array( 'post_type' => 'adventure_type', 'orderby' => 'date', 'order' => 'ASC', 'numberposts' => '4' );	
			$adventure_posts = get_posts( $args );
		?>
	<div class="">
		<?php foreach( $adventure_posts as $post) : setup_postdata($post); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
				<div class="thumbnail">
					<?php if(has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large' ); ?>
					<?php endif; ?>
					<div class="">
						<div class="entry-title">
							<?php the_title(sprintf('<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>'); ?>
              <a href=<?php echo get_post_permalink() ?> class="">read more</a>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php endforeach; wp_reset_postdata(); ?>
	<a href=<?php echo home_url().'/adventure_type' ?>>More adventure</a>
</section>

<?php get_footer(); ?>
