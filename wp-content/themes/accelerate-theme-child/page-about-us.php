<?php
/**
 * The template for the About page
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
	<?php query_posts('post_type=services_intro'); ?>
		<?php while ( have_posts() ) : the_post(); ?>


	<div class="site-content">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>

			<?php endwhile; ?>
		<?php wp_reset_query(); ?>

</section>


<section class="services-list site-content">
	<?php query_posts('post_type=services'); ?>
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

<section class="contact-box site-content">
	<?php query_posts('post_type=contact_box'); ?>
		<?php while ( have_posts() ) : the_post();
			$contact_intro = get_field("contact_intro");
			$cta = get_field("cta");
			if( $cta ):
		    $cta_url = $cta['url'];
		    $cta_title = $cta['title'];
		    $cta_target = $cta['target'] ? $cta['target'] : '_self';
		    ?>
			<?php endif; ?>

	<div class="contact-box-text">
		<h3><?php echo $contact_intro; ?></h3>
	</div>
	<div class="contact-box-button">
			<a class="button" href="<?php echo esc_url( $cta_url ); ?>" target="<?php echo esc_attr( $cta_target ); ?>"><?php echo esc_html( $cta_title ); ?></a>
	</div>

<?php endwhile; ?>
<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>
