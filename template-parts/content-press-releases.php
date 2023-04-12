<div id="news-grid">
    <div class="details-sidebar">
        <h1 class="sidebar-header">Press</h1>
        <ul>
            <?php 
                $featured_tags = array('all', 'art in america', 'artinfo', 'modern luxury', 'riviera');
                
                foreach($featured_tags as $tag) { 
                    if (strtolower($tag) == "past" || strtolower($tag) == "current" || strtolower($tag) == "upcoming" || strtolower($tag) == "ap") continue;

                    echo "<li><a style='text-decoration: none;' href='?tag=".$tag."'>".$tag."</a></li>";
                }
            ?>
        </ul>
    </div>
    <div id="news-content">
        <?php 
            $tag = '';

            if(isset($_GET['tag'])) {
                $tag = $_GET['tag'];

                if($tag == "all") $tag = "";
            }

            $args = array(
                'post_type' => 'press-release',
                'tag_slug__in' => $tag,
                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'numberposts' => '-1',
            );
            
            $loop = new WP_Query($args);

            if($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post();

                    $newsUrl = get_the_permalink();
                    $newsTitle = get_the_title();
                    $newsTag = '';

                    if (get_the_tags()) $newsTag = get_the_tags()[0]->name;

                    $imgUrl = get_the_post_thumbnail_url();

                    echo "<a class='news-link' href = '".$newsUrl."'>";
                    echo "<div class='news-result'>";
                    echo "<div class='news-image' style='background: url(".$imgUrl.")'></div>";
                    echo "<div class='news-result-text'>";
                    echo "<div>";
                    echo "<h2 class='news-title'>".$newsTitle."</h2>";
                    echo "<h3 class='news-tag'>".$newsTag."</h3>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
            }
        ?>
    </div>
</div>