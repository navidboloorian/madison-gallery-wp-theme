<div id="artists-image-grid">
    <?php 
        $artists_args = array(
            'category_name' => 'artist',
            'orderby' => 'name',
            'order' => 'ASC',
            'numberposts' => '-1',
        );

        $artists = get_posts($artists_args);

        foreach ($artists as &$artist) {
            if (has_post_thumbnail($artist->ID)) {
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($artist->ID), 'single-post-thumbnail');
                echo '<a class="artists-image-link" href="'.$artist->guid.'">';
                echo '<img class="artists-image" src="'.$thumbnail[0].'">';
                echo '<p class="artists-name">'.$artist->post_title.'</p>';
                echo '</a>';
            }
        }
    ?>
</div>
<?php 
    the_content();
?>