<?php
    // loads in header.php
    get_header();
?>
<div id="main-wrapper">
        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();

                    // gets the content of the specified page, in this case home
                    the_content();
                }
            }
        ?>
</div>
<?php 
    // loads in footer.php
    get_footer();
?>