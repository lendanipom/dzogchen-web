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
			<span class="caption"><a href="<?php echo get_permalink(9); ?>">Čhogjal Namkhai Norbu</a></span>
		</div>
	</div>
	<div class="paragraphs">
		<h2><a href="<?php echo get_permalink(315) ?>"/>Co je to Dzogčhen?</a></h2>
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop.  ?>
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
			<span class="caption"><a href="<?php echo get_permalink(13); ?>">Khjence Ješe Namkhai</a></span>
		</div>
	</div>
</div>
<div id="front-articles">
	<?php 
		function do_posts_in_column($column){
	?>
			<?php 
				$query = array("tag_id" => $column, "suppress_filters" => false,"post__in" => get_option("sticky_posts"));
				$res = get_posts($query);
				foreach($res as $post) :
			?>
			    <li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
			    <span class="published"><?php echo get_the_time('j.n.Y', $post); ?></span></li>
			<?php 
				endforeach; 
			?>
	<?php
		}
	?>
	<?php 
		$cols = array(
			array("class" => "masters", "tag" => "Učitelé", "label" => "Učitelé", "tag_id" => 36),
			array("class" => "teaching", "tag" => "Nauka", "label" => "Nauka a praxe", "tag_id" => 37),
			array("class" => "community", "tag" => "Komunita", "label" => "Lidé a místa", "tag_id" => 38)
		);
		for($i = 0; $i < count($cols); ++$i){
			?>
			<div class="small <?php echo $cols[$i]['class'] ?>">
				<div class="content">
					<ul>
						<?php echo do_posts_in_column($cols[$i]["tag_id"]) ?>
					</ul>
				</div>
				<div class="filter">
					<span><br/> <?php echo $cols[$i]['label'] ?> </span>
				</div>
			</div>
			<?php
		}
	?>
	<div class="big">
		<div class="content">
			<?php echo do_shortcode('[google-calendar-events id="1, 2" type="list" title="Events on" max="5"]'); ?>
		</div>
		<div class="filter">
			<span><br/>Kalendář české komunity</span>
		</div>
	</div>
</div>
<?php get_footer(); ?>

