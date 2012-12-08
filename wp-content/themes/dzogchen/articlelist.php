<div id="right-articles">
	<?php
		/**
		 * Pages has meta fields related_categories and related_tags, which contains comma separated ids, those are used to provide related articles
		 */
		$taxonomy_values = array_merge(get_post_meta($post->ID, "related_tag", false),get_post_meta($post->ID, "related_category", false));
		if($post->post_type == "post"){
			$the_tags = get_the_tags($post->ID);
			$i = 0;
			foreach($the_tags as $key => $val){
				$arr_tags[$i] = $key;
				$i++;
			}
			$taxonomy_values = array_merge($taxonomy_values, $arr_tags);
		}
		if(count($taxonomy_values) > 0){
			global $wpdb;
			$taxonomy_query = $taxonomy_values[0];
			for($i = 0; $i < count($taxonomy_values); ++$i){
				$taxonomy_query = $taxonomy_query . "," . $taxonomy_values[$i];
			}
			$post_ids = $wpdb->get_col( $wpdb->prepare( "
				SELECT ID
				FROM $wpdb->posts
				JOIN $wpdb->term_relationships on (ID = object_id)
				WHERE post_type = 'post'
				AND term_taxonomy_id IN ( $taxonomy_query )
				AND ID <> $post->ID
				ORDER BY post_date
				LIMIT 0,5;
			" ) );
			if(count($post_ids) > 0){
				$query_args = array( 'post__in' => $post_ids ); 
				$related_posts = get_posts($query_args);
	?>
		<h2>Související články</h2>
		<ul>
			<?php
				foreach($related_posts as $post) :
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
