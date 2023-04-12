<?php
    // loads in header.php
    get_header();
?>
<div id="main-wrapper">
    <div id="fair-content-wrapper">
        <?php 
            $imgUrl = get_the_post_thumbnail_url();
            $title = get_the_title();

            echo "<img id='exhibition-image' src ='".$imgUrl."'>";
            echo "<h3 id='exhibition-date'></h3>";
            echo "<h1 id='exhibition-title'>".$title."</h1>";
            echo "<h2 id='exhibition-artist'></h2>";
            echo "<div id='fair-content'></div>";
        ?> 
    </div>
    <div class="hidden">
        <?php the_content(); ?>
    </div>
</div>
<?php 
    // loads in footer.php
    get_footer();
?> 