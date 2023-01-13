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
        </div>
        <footer id="footer">
            <div id="footer-content">
                <div class="footer-row" id="footer-contact-row">
                    <div id="footer-address">
                        <p>
                            320 SOUTH CEDROS AVENUE, SUITE 200<br>
                            SOLANA BEACH, CA 92075<br>
                            TEL 858 523 9155<br>
                            INFO@MADISONGALLERIES.COM
                        </p>
                    </div>
                    <div id="footer-email">
                        <p>
                            To receive emails about updates, exhibitions, and more, sign up for our mailing list.
                        </p>
                    </div>
                    <div id="footer-links"></div>
                </div>
                <div class="footer-row" id="footer-artists-row">
                    <?php 
                        global $wpdb;

                        $artists = $wpdb->get_results('SELECT * FROM artists');
                        
                        foreach ($artists as &$artist) {
                            echo '<a href="#"><li class="footer-artist-name">'.$artist->name.'</li></a>';
                        }
                    ?>
                </div>
                <div class="footer-row" id="footer-copyright-row">test</div>
            </div>
        </footer>
        <?php 
            // inject scripts
            wp_footer();
        ?>
    </body>
</html>