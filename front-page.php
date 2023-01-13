<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            // injects styles
            wp_head(); 
        ?>
    </head>
    <body>
        <div id="main-wrapper">
            <nav>
                <!--unblurred this image as a QOL fix from the original website-->
                <img width="256" src=<?php echo get_template_directory_uri()."/assets/images/navbar-logo.jpg" ?> />
            </nav>
            <?php 
                // inject scripts
                wp_footer();
            ?>
        </div>
    </body>
</html>