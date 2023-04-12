<?php
    // loads in header.php
    get_header();
?>
<div id="main-wrapper">
    <div id="press-wrapper">
        <h1 class="sidebar-header">Press</h1>
        <?php 
            echo "<h2 id='press-tag'>".get_the_title()."</h2>";
            the_content();
        ?> 
    </div>
</div>
<?php 
    // loads in footer.php
    get_footer();
?> 