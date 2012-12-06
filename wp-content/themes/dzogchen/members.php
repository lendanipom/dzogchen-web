<?php
/*
	Template Name: Members
*/
?>

<?php get_header(); ?>
	<div id="members-area" class="main-content">
		<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop.   ?>
	</div>
<?php get_footer(); ?>
