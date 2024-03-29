<div id="exhibitions-wrapper">
    <?php 
        // get current exhibitions
        $args = array(
            'post_type' => 'exhibition',
            'orderby' => 'date',
            'order' => 'ASC',
            'tag' => 'current',
            'posts_per_page' => -1,
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            $loop->the_post();

            $exhibitionUrl = get_the_permalink();
            $exhibitionTitle = get_the_title();
            $exhibitionTag = get_the_tags()[0]->name;
            $imgUrl = get_the_post_thumbnail_url();

            echo "<a class='exhibition-image-link' href = '".$exhibitionUrl."'>";
            echo "<div id='featured-exhibition'>";
            echo "<img class='exhibition-image' src='".$imgUrl."'>";
            echo "<h3 id='featured-exhibition-tag' class='exhibition-tag'>".$exhibitionTag."</h3>";
            echo "<h1 id='featured-exhibition-title'>".$exhibitionTitle."</h2>";
            echo "<h3 class='exhibition-date-display'></h3>";
            echo "</div>";
            echo "<div class='hidden'>";
            echo the_content();
            echo "</div>";
            echo "</a>";
        }

        echo "<div class='exhibitions-grid'>";
        while ($loop->have_posts()) {
            $loop->the_post();

            $exhibitionUrl = get_the_permalink();
            $exhibitionTitle = get_the_title();
            $exhibitionTag = get_the_tags()[0]->name;
            $imgUrl = get_the_post_thumbnail_url();

            echo "<a class='exhibition-image-link' href = '".$exhibitionUrl."'>";
            echo "<img class='artists-image' src='".$imgUrl."'>";
            echo "<h6 id='featured-exhibition-tag' class='exhibition-tag'>".$exhibitionTag."</h6>";
            echo "<h4 id='featured-exhibition-title'>".$exhibitionTitle."</h4>";
            echo "<h6 class='exhibition-date-display'></h6>";
            echo "<div class='hidden'>";
            echo the_content();
            echo "</div>";
            echo "</a>";
        }
        echo "</div>";

        wp_reset_postdata();

        // get upcoming exhibitions
        $args = array(
            'post_type' => 'exhibition',
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
        }

        echo "<div class='exhibitions-grid'>";
        while ($loop->have_posts()) {
            $loop->the_post();

            $exhibitionUrl = get_the_permalink();
            $exhibitionTitle = get_the_title();
            $exhibitionTag = get_the_tags()[0]->name;
            $imgUrl = get_the_post_thumbnail_url();

            echo "<a class='exhibition-image-link' href = '".$exhibitionUrl."'>";
            echo "<img class='artists-image' src='".$imgUrl."'>";
            echo "<h6 id='featured-exhibition-tag' class='exhibition-tag'>".$exhibitionTag."</h6>";
            echo "<h4 id='featured-exhibition-title'>".$exhibitionTitle."</h4>";
            echo "<h6 class='exhibition-date-display'></h6>";
            echo "<div class='hidden'>";
            echo the_content();
            echo "</div>";
            echo "</a>";
        }
        echo "</div>";

        wp_reset_postdata();

        // get first six past exhibitions
        $args = array(
            'post_type' => 'exhibition',
            'orderby' => 'date',
            'order' => 'ASC',
            'tag' => 'past',
            'posts_per_page' => -1,
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        if($loop->have_posts()) {
            echo "<hr>";
            echo "<h3 class='exhibition-group-label'>Past</h3>";
        }

        $number_past_posts = 0;

        echo "<div class='exhibitions-grid'>";
        while ($loop->have_posts()) {
            $loop->the_post();

            $exhibitionUrl = get_the_permalink();
            $exhibitionTitle = get_the_title();
            $exhibitionTag = get_the_tags()[0]->name;
            $imgUrl = get_the_post_thumbnail_url();

            $number_past_posts++;

            if($number_past_posts <= 6) {
                echo "<a class='exhibition-image-link' href = '".$exhibitionUrl."'>";
            }
            else {
                echo "<a class='exhibition-image-link hidden' href = '".$exhibitionUrl."'>";
            }

            echo "<img class='artists-image' src='".$imgUrl."'>";
            echo "<h6 id='featured-exhibition-tag' class='exhibition-tag'>".$exhibitionTag."</h6>";
            echo "<h4 id='featured-exhibition-title'>".$exhibitionTitle."</h4>";
            echo "<h6 class='exhibition-date-display'></h6>";
            echo "<div class='hidden'>";
            echo the_content();
            echo "</div>";
            echo "</a>";
        }
        echo "</div>";
        echo "<div id = 'see-more-wrapper'><hr><button id='see-more-button'>see more</button><hr></div>";

        wp_reset_postdata();
    ?>
</div>  