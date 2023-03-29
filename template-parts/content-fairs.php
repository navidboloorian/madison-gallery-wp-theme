<div id="fair-wrapper">
    <?php 
        // get current exhibitions
        $args = array(
            'post_type' => 'fair',
            'orderby' => 'date',
            'order' => 'DESC',
            'tag' => 'current',
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            echo "<h3 class='exhibition-group-label'>Current</h3>";
        }

        echo "<div class='exhibitions-grid'>";
        while ($loop->have_posts()) {
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

        wp_reset_postdata();

        // get upcoming exhibitions
        $args = array(
            'post_type' => 'fair',
            'orderby' => 'date',
            'order' => 'DESC',
            'tag' => 'upcoming',
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            echo "<br>";
            echo "<h3 class='exhibition-group-label'>Upcoming</h3>";
        }

        echo "<div class='exhibitions-grid'>";
        while ($loop->have_posts()) {
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

        wp_reset_postdata();

        // get past exhibitions
        $args = array(
            'post_type' => 'fair',
            'orderby' => 'date',
            'order' => 'DESC',
            'tag' => 'past',
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            echo "<hr>";
            echo "<h3 class='exhibition-group-label'>Past</h3>";
        }

        echo "<div class='exhibitions-grid'>";
        while ($loop->have_posts()) {
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

        wp_reset_postdata();
    ?>
</div>  