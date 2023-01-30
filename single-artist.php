<?php
    // loads in header.php
    get_header();
?>
<div id="main-wrapper">
    <div id="artist-wrapper">
        <div class="details-sidebar">
            <h1 class="sidebar-header"><?php the_title(); ?></h1>
            <ul>
            </ul>
        </div>
        <div id="artist-content">
        </div>
    </div>
    <div class="hidden">
        <?php the_content(); ?>
    </div>
</div>
<?php 
    // loads in footer.php
    get_footer();
?> 