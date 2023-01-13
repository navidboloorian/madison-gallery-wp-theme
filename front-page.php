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
            <header id="header-wrapper">
                <nav id="navbar">
                    <!--unblurred this image as a QOL fix from the original website-->
                    <a href="#"><img width="235" src=<?php echo get_template_directory_uri()."/assets/images/navbar-logo.jpg" ?> /></a>
                    <ul id="navbar-directory">
                        <a href="#"><li>ARTISTS</li></a>
                        <a href="#"><li>EXHIBTIONS</li></a>
                        <a href="#"><li>PRESS</li></a>
                        <a href="#"><li>CONTACT</li></a>
                        <a href="#"><li>ABOUT</li></a>
                    </ul>
                </nav>
            </header>
            <?php 
                // inject scripts
                wp_footer();
            ?>
        </div>
    </body>
</html>