<footer id="footer-wrapper">
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