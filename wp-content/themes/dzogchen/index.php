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
<div id="head-image">
<?php 
	$thisID = $post->ID;
	$parentID = get_page($hierPageID)->post_parent;
	$path = "/wp-content/themes/dzogchen/images/header";
	$image = $path . $thisID . ".jpg";	
	if(!file_exists(getcwd() . $image)){
		$image = $path . $parentID . ".jpg";	
	} 
	if(!file_exists(getcwd() . $image)){
?>
		<?php do_action('slideshow_deploy', '1277'); ?>		
<?php 
	} else {
		echo "<img src=\"$image\"/>";
	}
?>
</div>
<div id="article-content">
<?php while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div class="postedon"><?php dzogchen_posted_on(); ?>, autor: <?php the_author(); ?></div>

    <?php the_content(); ?>

<?php endwhile; // end of the loop.   ?>
</div>
<?php get_template_part( "articlelist" ) ?> 
<?php get_footer(); ?>

