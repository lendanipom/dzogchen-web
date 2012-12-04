<?php /**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */ ?>
<?php get_header(); ?>
<div id="article-plus-newest-articles">
	<div id="article-content" class="post">
		<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<div class="postedon">
			<?php dzogchen_posted_on(); ?>, autor: <?php the_author(); ?>
		</div>
	</div>
	<?php get_template_part( "articlelist" ) ?> 
</div>
<?php get_footer(); ?>

