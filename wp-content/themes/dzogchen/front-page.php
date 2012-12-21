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
	<!-- mfunc $res -->
	<?php 
		function do_posts_in_column($column){
	?>
			<?php 
				$query = array("cat" => $column, "suppress_filters" => true,"post__in" => get_option("sticky_posts"));
				if(!is_user_logged_in()){
					$additional = array("meta_key" => "rcUserLevel", "meta_value" => "None");
					$query = array_merge($query, $additional);
				}
				$res = get_posts($query);
				foreach($res as $post) :
			?>
			    <li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
			    <span class="published"><?php echo get_the_time('j.n.Y', $post); ?></span></li>
			<?php 
				endforeach; 
			?>
	<?php
		}
	?>
	<!-- /mfunc -->
	<?php 
		$cols = array(
			array("class" => "masters", "tag" => "Učitelé", "label" => "Učitelé", "tag_id" => 36),
			array("class" => "teaching", "tag" => "Cesta", "label" => "Cesta", "tag_id" => 37),
			array("class" => "community", "tag" => "Komunita", "label" => "Lidé a místa", "tag_id" => 38),
			array("label" => "Kalendář české komunity")
		);
		for($i = count($cols) -1; $i >= 0; --$i){
			?>
				<div class="container <?php $v = $cols[$i]['class']; echo ($v == NULL ? "" : "container-$v") ?>">
				<div class="filter">
					<span><br/> <?php echo $cols[$i]['label'] ?> </span>
				</div>
				<?php
			}
			for($i = 0; $i < count($cols) - 1; ++$i){
				?>
				<div class="small <?php echo $cols[$i]['class'] ?>">
					<div class="content">
						<ul>
							<?php echo do_posts_in_column($cols[$i]["tag_id"]) ?>
						</ul>
					</div>
				</div>
				<?php
			}
			?>
				<div class="big">
					<div class="content">
						<?php echo do_shortcode('[google-calendar-events id="1, 2" type="list" title="Events on" max="5"]'); ?>
					</div>
				</div>
		<?php
		for($i = 0; $i < count($cols); ++$i){ // one more round for calendar
			?>
				</div>
			<?php
		}
	?>
</div>
<?php get_footer(); ?>

