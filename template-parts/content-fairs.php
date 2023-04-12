<div id="fair-wrapper">
    <?php 
        $line_visible = false;

        // get current exhibitions
        $args = array(
            'post_type' => 'fair',
            'orderby' => 'date',
            'order' => 'ASC',
            'tag' => 'current',
            'posts_per_page' => -1,
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            echo "<h3 class='exhibition-group-label'>Current</h3>";
            echo "<div class='exhibitions-grid'>";

            while ($loop->have_posts()) {
                $line_visible = true;

                $loop->the_post();

                $fairUrl = get_the_permalink();
                $fairTitle = get_the_title();
                $imgUrl = get_the_post_thumbnail_url();

                echo "<a class='exhibition-image-link' href = '".$fairUrl."'>";
                echo "<img class='artists-image' src='".$imgUrl."'>";
                echo "<h4 id='featured-exhibition-title'>".$fairTitle."</h4>"; 
                echo "<h6 class='fair-date-display'></h6>";
                echo "<div class='hidden'>";
                echo the_content();
                echo "</div>";
                echo "</a>";
            }
            echo "</div>";
        }

        wp_reset_postdata();

        // get upcoming exhibitions
        $args = array(
            'post_type' => 'fair',
            'orderby' => 'date',
            'order' => 'ASC',
            'tag' => 'upcoming',
            'posts_per_page' => -1,
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            echo "<br>";
            echo "<h3 class='exhibition-group-label'>Upcoming</h3>";

            echo "<div class='exhibitions-grid'>";
            while ($loop->have_posts()) {
                $line_visible = true;

                $loop->the_post();

                $fairUrl = get_the_permalink();
                $fairTitle = get_the_title();
                $imgUrl = get_the_post_thumbnail_url();

                echo "<a class='exhibition-image-link' href = '".$fairUrl."'>";
                echo "<img class='artists-image' src='".$imgUrl."'>";
                echo "<h4 id='featured-exhibition-title'>".$fairTitle."</h4>"; 
                echo "<h6 class='fair-date-display'></h6>";
                echo "<div class='hidden'>";
                echo the_content();
                echo "</div>";
                echo "</a>";
            }
            echo "</div>";
        }

        wp_reset_postdata();

        // get past exhibitions
        $args = array(
            'post_type' => 'fair',
            'orderby' => 'date',
            'order' => 'ASC',
            'tag' => 'past',
            'posts_per_page' => -1,
            'numberposts' => '-1',
        );

        $number_past_posts = 0;

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            if($line_visible) echo "<hr>";
            
            echo "<h3 class='exhibition-group-label'>Past</h3>";
            echo "<div class='exhibitions-grid'>";

            while ($loop->have_posts()) {
                $loop->the_post();

                $number_past_posts++;

                $fairUrl = get_the_permalink();
                $fairTitle = get_the_title();
                $imgUrl = get_the_post_thumbnail_url();

                
                if($number_past_posts <= 6) {
                    echo "<a class='exhibition-image-link' href = '".$fairUrl."'>";
                }
                else {
                    echo "<a class='exhibition-image-link hidden' href = '".$fairUrl."'>";
                }
                echo "<img class='artists-image' src='".$imgUrl."'>";
                echo "<h4 id='featured-exhibition-title'>".$fairTitle."</h4>"; 
                echo "<h6 class='fair-date-display'></h6>";
                echo "<div class='hidden'>";
                echo the_content();
                echo "</div>";
                echo "</a>";
            }
            echo "</div>";
            echo "<div id = 'see-more-wrapper'><hr><button id='see-more-button'>see more</button><hr></div>";
        }

        wp_reset_postdata();
    ?>
</div>  