<div id="artists-image-grid">
    <?php 
        $args = array(
            'post_type' => 'artist',
            'orderby' => 'title',
            'order' => 'ASC',
            'numberposts' => '-1',
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()) {
            $loop->the_post();

            $artistUrl = get_the_permalink();
            $artistName = get_the_title();
            $imgUrl = get_the_post_thumbnail_url();

            echo "<a class='artists-image-link' href = '".$artistUrl."'>";
            echo "<img class='artists-image' src='".$imgUrl."'>";
            echo "<p class='artists-name'>".$artistName."</p>";
            echo "</a>";
        }

        wp_reset_postdata();
    ?>
</div>  