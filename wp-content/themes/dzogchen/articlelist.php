<div id="right-articles">
	<!-- mfunc $related_posts -->
	<?php
		$post_id = $post->ID;	
		$post_not_in = array($post_id);
		$baseQuery = array(
			"post__not_in" => $post_not_in,
			"showposts" => 5
		); 
		if(!is_user_logged_in()){
			$additional = array("meta_key" => "rcUserLevel", "meta_value" => "None");
			$baseQuery = array_merge($baseQuery, $additional);
		}
		/**
		 * Pages has meta fields related_categories , which contains array of ids, those are used to provide related articles
		 */
		$taxonomy_values = get_post_meta($post_id, "related_category", false);
		if($post->post_type == "post") {
			// show the pages with similar tags
			$the_categories = get_the_category($post_id);
			$i = 0;
			foreach($the_categories as $the_category_id){
				$arr_categories[$i] = $the_category_id->term_id;
				$i++;
			}
			$taxonomy_values = array_merge($taxonomy_values, $arr_categories);
		}
		if(count($taxonomy_values) > 0){
			$query = $baseQuery;
			$query["category__in"] = $taxonomy_values;
			$related_posts = get_posts($query);
			if(count($related_posts) > 0){
	?>
		<h2>Související články</h2>
		<ul>
			<?php
				$exclude_from_newest = $post_not_in;
				foreach($related_posts as $postVar) :
				array_push($exclude_from_newest, $postVar->ID);
			?>
			    <li><a href="<?php echo get_permalink($postVar->ID); ?>"><?php echo $postVar->post_title; ?></a>
			    <span class="published"><?php echo get_the_time('j.n.Y', $postVar); ?></span></li>
			<?php 
				endforeach; 
			?>
	<!-- /mfunc -->
	<!-- mfunc $newest -->
	<?php } } 
		$query = $baseQuery;
		$query['post__not_in'] = $exclude_from_newest;
		$newest = get_posts($query);
		if(count($newest) > 0){
	?>
	</ul>
	<h2>Nejnovější články</h2>
	<ul>
		<?php
				foreach($newest as $postVar) :
			?>
			    <li><a href="<?php echo get_permalink($postVar->ID); ?>"><?php echo $postVar->post_title; ?></a>
			    <span class="published"><?php echo get_the_time('j.n.Y', $postVar); ?></span></li>
			<?php 
				endforeach; 
			?>
	</ul>
	<?php } ?>
	<!-- /mfunc -->
</div>
