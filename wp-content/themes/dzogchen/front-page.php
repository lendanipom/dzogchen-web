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
<div id="front-page-paragraphs">
	<div class="rinpoche masters-box">
		<img src="
			<?php 
				$baseUrl = bloginfo('stylesheet_directory');
				$srcUrl = $baseUrl . "/images/choegyal-namkhai-norbu-rinpoche-first-page.png";
				echo $srcUrl;
			?>
		"/>
		<div class="filter">
			<span class="caption"><a href="">Čhogjal Namkhai Norbu</a></span>
		</div>
	</div>
	<div class="paragraphs">
		<?php while (have_posts()) : the_post(); ?> <?php the_content(); ?> <?php endwhile; // end of the loop.  ?>
		<div class="filter">
			<span class="caption"><a href="<?php $permalink = get_permalink(9); ?>"><br/>Co je to Dzogčhen?</a></span>
		</div>
	</div>
	<div class="khyentse masters-box">
		<img src="
			<?php 
				$baseUrl = bloginfo('stylesheet_directory');
				$srcUrl = $baseUrl . "/images/khyentse-yeshe-namkhai-first-page.png";
				echo $srcUrl;
			?>
		"/>
		<div class="filter">
			<span class="caption"><a href="<?php $permalink = get_permalink(13); ?>">Khjence Ješe Namkhai</a></span>
		</div>
	</div>
</div>
        <?php /*
    <h2>Nejnovější články</h2>
        $recentPosts = new WP_Query();
        $recentPosts->query('showposts=15');
        while ($recentPosts->have_posts()): $recentPosts->the_post();
            ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <span class="published"><?php echo get_the_date('j.n.Y'); ?></span>
            <div style="clear: both;"></div>
            <?php the_excerpt(); ?> 
        <?php endwhile; ?>
	*/ ?>
<?php get_footer(); ?>

