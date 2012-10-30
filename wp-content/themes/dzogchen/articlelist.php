<div class="right-box" id="right-articles">
    <h2>Nejnovější články</h2>
    <div class="right-box-inner scroll-pane">
        <?php
        $recentPosts = new WP_Query();
        $recentPosts->query('showposts=5');
        while ($recentPosts->have_posts()): $recentPosts->the_post();
            ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <span class="published"><?php echo get_the_date('j.n.Y'); ?></span>
            <div style="clear: both;"></div>
            <?php the_excerpt(); ?> 
        <?php endwhile; ?>
    </div>
</div>
