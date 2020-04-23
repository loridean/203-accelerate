<?php
/*
Template Name: About
*/
?>
<?php
/**
 * The template for the About page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */



get_header(); ?>

<div id="primary" class="about-page hero-content">
	<div class="main-content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .main-content -->
</div><!-- #primary -->

<section class="services-intro">
	<div class="site-content">
		<h4>our services</h4>
		<p>We take pride in our clients and the content we create for them.
Here’s a brief overview of our offered services.</p>
	</div>
</section>


<section class="services-list site-content">
	<?php query_posts('post_type=about'); ?>
		<?php while ( have_posts() ) : the_post();
			$icon = get_field("icon");
			$size = "custom";
		?>
		
	<div class="services-item">
		<div class="services-image">
				<?php echo wp_get_attachment_image($icon, $size); ?>
		</div>
		<div class="services-info">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
		</div>
	</div>

			<?php endwhile; ?>
		<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>
