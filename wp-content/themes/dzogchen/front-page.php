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
	
    $var = ($_SERVER['HTTP_HOST']);
	$exploded = explode('.',$var);
	$nullth = $exploded[0];
	if($nullth == 'localhost'){
	 do_action('slideshow_deploy', '1277'); 
	} else if ($nullth == 'phendeling') {
	 do_action('slideshow_deploy', '1314'); 
	}
?>
</div>
<div id="front-page-paragraphs">
        <?php while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; // end of the loop.  ?>
<table id="three-columns">
<tr><td class="front-col" id="front-news">
    <h2>Nejnovější články</h2>
        <?php
        $recentPosts = new WP_Query();
        $recentPosts->query('showposts=15');
        while ($recentPosts->have_posts()): $recentPosts->the_post();
            ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <span class="published"><?php echo get_the_date('j.n.Y'); ?></span>
            <div style="clear: both;"></div>
            <?php the_excerpt(); ?> 
        <?php endwhile; ?>
</td>
<td class="front-col other" id="front-events">
    <h2>Nejbližší akce v čechách</h2>
    <?php echo do_shortcode('[google-calendar-events id="1, 2" type="list" title="Events on" max="10"]'); ?>
</td>
<td class="front-col other" id="front-places">
	<h2>Centra v Česku</h2>
	<ul>
		<li><a href="http://phendeling.localhost/">Phendeling</a></li>
		<li><a href="http://kunkhyabling.localhost/">Kunkhyabling</a></li>
		<li><a href="http://plzen.localhost/">Plzeň</a></li>
	</ul>
</td></tr>
</table>
<?php get_footer(); ?>
