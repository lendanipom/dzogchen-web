<div id="right-articles">
	<?php
		if($post->post_type == "page"){
			$name = $post->post_name;
			$catId = get_cat_ID($name);
			$args = array(
				"category" => $catId
			);
		} else if($post->post_type == "post"){
			$tags = wp_get_post_tags($post->ID, array('fields' => 'ids'));
			$args = array(
				"tag__in" => $tags
			);
		} else {
			die();
		}
	?>
	<?php 
		if($catId != 0 || $post->post_type == "post"){ 
			$args["showposts"] = 5;
			$args["post__not_in"] = array($post->ID);
			$relatedPosts = get_posts($args);
			$arrSize = count($relatedPosts);
			if($arrSize > 0){
	?>
		<h2>Související články</h2>
		<ul>
			<?php
				foreach($relatedPosts as $post) :
			?>
			<li>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="published"><?php echo get_the_date('j.n.Y'); ?></span>
			</li>
			<?php 
				endforeach; 
			?>
	<?php } } ?>
	</ul>
	<h2>Nejnovější články</h2>
	<ul>
		<?php
			$argsNewest["showposts"] = 5;
			$argsNewest["post__not_in"] = array($post->ID);
			$newest = get_posts($argsNewest);
			foreach($newest as $post) :
		?>
		<li>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<span class="published"><?php echo get_the_date('j.n.Y'); ?></span>
		</li>
		<?php 
			endforeach; 
		?>
	</ul>
</div>
