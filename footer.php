<footer id="footer-wrapper">
            <div id="footer-content">
                <div class="footer-row" id="footer-contact-row">
                    <div id="footer-address">
                        <p>
                            320 SOUTH CEDROS AVENUE, SUITE 200<br>
                            SOLANA BEACH, CA 92075<br>
                            <a href="tel:8585239155">TEL 858 523 9155</a><br>
                            <a href="javascript:window.location.href = 'mailto:' + ['info','madisongalleries.com'].join('@')">INFO<!----->@<!------>MADISONGALLERIES.COM</a>
                        </p>
                    </div>
                    <div id="footer-email">
                        <p>
                            To receive emails about updates, exhibitions, and more, <a href="/contact">sign up</a> for our mailing list.
                        </p>
                    </div>
                    <div id="footer-links">
                        <div>
                            <a href="https://www.artsy.net/madison-gallery">
                                <img id="artsy-logo" src=<?php echo get_template_directory_uri()."/assets/images/artsy-logo.jpg" ?>>
                            </a>
                        </div>
                        <div>
                            <div id="social-media-links">
                                <a href="https://www.facebook.com/MadisonGallery">
                                    <img src=<?php echo get_template_directory_uri()."/assets/images/facebook-icon.gif" ?>>
                                </a>
                                <a href="http://instagram.com/madisongallery">
                                    <img src=<?php echo get_template_directory_uri()."/assets/images/instagram-icon.jpg" ?>>
                                </a>
                            </div>
                        </div>
                        <div>
                            <a href="https://www.artland.com/galleries/madison-gallery">
                                <img width="68" src=<?php echo get_template_directory_uri()."/assets/images/artland-logo.png" ?>>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer-row" id="footer-artists-row">
                    <?php 
                        $args = array(
                            'post_type' => 'artist',
                            'orderby' => 'last_name',
                            'order' => 'ASC',
                            'posts_per_page' => -1,
                            'numberposts' => -1,
                        );
                
                        $loop = new WP_Query($args);
                
                        while ($loop->have_posts()) {
                            $loop->the_post();
                
                            $artistUrl = get_the_permalink();
                            $artistName = get_the_title();
                            $imgUrl = get_the_post_thumbnail_url();
                
                            echo '<a href="'.$artistUrl.'"><li class="footer-artist-name">'.$artistName.'</li></a>';
                        }
                
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="footer-row" id="footer-copyright-row">
                    <p>© 2023 <b>Madison Gallery</b> All Rights Reserved</p>
                    <div id="footer-disclaimer">
                        The gallery is not accepting any unsolicited submissions at this time<br>
                        <b>NO WALK-IN SUBMISSIONS WILL BE ACCEPTED</b>
                    </div>
                </div>
            </div>
        </footer>
        <?php 
            // inject scripts
            wp_footer();
        ?>
    </body>
</html>