<?php
/**
 * The template for displaying Author post list pages
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

get_header(); ?>

<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<?php if ( have_posts() ): ?>
	<header class="page-header">
		<h1 class="page-title">Posts by <span class="author-name"><?php echo $curauth->display_name; ?></span></h1>
	</header>
<?php endif; ?>

<section class="author-page">
	<div class="site-content">
		<div class="main-content">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content-blog', get_post_format() ); ?>
				<?php endwhile ?>
			<?php else: ?>
				<article>
					<h4>No posts found!</h4>
				</article>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</section>

<nav id="navigation" class="container">
	<div class="left"><?php next_posts_link('&larr; <span>Older Posts</span>'); ?></div>
	<div class="pagination">
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			echo 'Page '.$paged.' of '.$wp_query->max_num_pages;
		?>
	</div>
	<div class="right"><?php previous_posts_link('<span>Newer Posts</span> &rarr;'); ?></div>
</nav>

<?php get_footer(); ?>
