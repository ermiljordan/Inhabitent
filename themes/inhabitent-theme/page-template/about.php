<?php
/**
 * Template Name: About
 *
 * @package Inhabitent_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				<header>
          <div class="about-hero-banner">
            <h2 class="about">About</h2>
          </div>
        </header>
        <div class="container about-content">
          <h2 class="story-header">Our Story</h2>
          <?php echo CFS()->get('our_story'); ?>
          <h2 class="story-header">Our Team</h2>
          <?php echo CFS()->get('our_team'); ?>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
