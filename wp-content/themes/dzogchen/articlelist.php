<div id="right-articles">
	<h2>Nejnovější články</h2>
	<ul>
		<?php
			$recentPosts = new WP_Query();
			$recentPosts->query('showposts=5');
			while ($recentPosts->have_posts()): $recentPosts->the_post();
		?>
		<li>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<span class="published"><?php echo get_the_date('j.n.Y'); ?></span>
		</li>
		<?php 
			endwhile; 
		?>
	</ul>
</div>
