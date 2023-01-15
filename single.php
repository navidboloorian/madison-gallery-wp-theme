<?php
    // loads in header.php
    get_header();
?>
<div id="main-wrapper">
        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    
                    // pulls up content-[cat_name].php
                    // ex: if this is an artist page, it will pull up content-artist.php
                    get_template_part('template-parts/content', get_the_category()[0]->cat_name);
                }
            }
        ?>
</div>
<?php 
    // loads in footer.php
    get_footer();
?>