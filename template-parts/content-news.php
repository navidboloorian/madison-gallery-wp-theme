<div id="news-grid">
    <div class="details-sidebar">
        <h1 class="sidebar-header"><?php the_title(); ?></h1>
    </div>
    <div id="news-content">
        <?php 
            $args = array(
                'post_type' => 'news',
                'orderby' => 'date',
                'order' => 'DESC',
                'numberposts' => '-1',
            );
            
            $loop = new WP_Query($args);

            if($loop->have_posts()) {
                $loop->the_post();

                $newsUrl = get_the_permalink();
                $newsTitle = get_the_title();
                $newsTag = get_the_tags()[0]->name;
                $imgUrl = get_the_post_thumbnail_url();

                echo "<a class='news-link' href = '".$newsUrl."'>";
                echo "<div class='news-result'>";
                echo "<div class='news-image' style='background: url(".$imgUrl.")'></div>";
                echo "<div class='news-result-text'>";
                echo "<div>";
                echo "<h3 class='news-tag'>".$newsTag."</h3>";
                echo "<h2 class='news-title'>".$newsTitle."</h2>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
            }
        ?>
    </div>
</div>