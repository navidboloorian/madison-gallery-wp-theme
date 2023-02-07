<?php
    // loads in header.php
    get_header();
?>
<div id="main-wrapper">
        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content', str_replace(' ', '-', strtolower(get_the_title())));
                }
            }
        ?>
</div>
<?php 
    // loads in footer.php
    get_footer();
?>