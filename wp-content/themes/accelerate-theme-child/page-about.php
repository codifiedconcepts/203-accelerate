<?php
/**
 * The template for displaying the About page.
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
			<?php while ( have_posts() ) : the_post();
				$mission = get_field('mission_statement');?>
				<h2><?php echo $mission; ?></h2>
			<?php endwhile; // end of the loop. ?>
		</div><!-- .main-content -->
	</div><!-- #primary -->

	<section class="services">
		<div class="site-content">
			<?php while ( have_posts() ) : the_post();
				$size = "full";
				$service_1 = get_field('service_1');
				$service_title_1 = get_field('service_title_1');
				$service_image_1 = get_field('service_image_1');
				$service_2 = get_field('service_2');
				$service_title_2 = get_field('service_title_2');
				$service_image_2 = get_field('service_image_2');
				$service_3 = get_field('service_3');
				$service_title_3 = get_field('service_title_3');
				$service_image_3 = get_field('service_image_3');
				$service_4 = get_field('service_4');
				$service_title_4 = get_field('service_title_4');
				$service_image_4 = get_field('service_image_4');
			?>

			<?php the_content(); ?>

			<div class="our-services">
				<?php if($service_title_1) : ?>
					<section class="individual-service clearfix">
						<figure class="about-service-image">
							<?php if($service_image_1){
								echo wp_get_attachment_image( $service_image_1, $size );
							} ?>
						</figure>
						<aside class="about-service">
							<h2><?php echo $service_title_1; ?></h2>
							<p><?php echo $service_1; ?></p>
						</aside>
					</section>
				<?php endif; ?>

				<?php if($service_title_2) : ?>
					<section class="individual-service clearfix">
						<figure class="about-service-image">
							<?php if($service_image_2){
								echo wp_get_attachment_image( $service_image_2, $size );
							} ?>
						</figure>
						<aside class="about-service">
							<h2><?php echo $service_title_2; ?></h2>
							<p><?php echo $service_2; ?></p>
						</aside>
					</section>
				<?php endif; ?>

				<?php if($service_title_3) : ?>
					<section class="individual-service clearfix">
						<figure class="about-service-image">
							<?php if($service_image_1){
								echo wp_get_attachment_image( $service_image_3, $size );
							} ?>
						</figure>
						<aside class="about-service">
							<h2><?php echo $service_title_3; ?></h2>
							<p><?php echo $service_3; ?></p>
						</aside>
					</section>
				<?php endif; ?>

				<?php if($service_title_4) : ?>
					<section class="individual-service clearfix">
						<figure class="about-service-image">
							<?php if($service_image_1){
								echo wp_get_attachment_image( $service_image_4, $size );
							} ?>
						</figure>
						<aside class="about-service">
							<h2><?php echo $service_title_4; ?></h2>
							<p><?php echo $service_4; ?></p>
						</aside>
					</section>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>
		</div>

		<div class="contact-button">
			<h2 >Interested in working with us?</h2>
			<a class="button" href="<?php echo home_url(); ?>/contact-us">Contact Us</a>
		</div>
	</section>

<?php get_footer(); ?>
