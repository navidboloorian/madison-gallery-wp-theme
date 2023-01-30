<?php 
    if(isset($_POST['mailing-list-submit'])) {
        global $wpdb;

        $name = htmlspecialchars($_POST['mailing-list-name']);
        $email = htmlspecialchars($_POST['mailing-list-email']);

        $wpdb->insert('mailing_list', array('name' => $name, 'email' => $email));
    }
?>
<div id="contact-grid">
    <div id="contact-sidebar">
        <h1 class="sidebar-header">Contact</h1>
    </div>
    <div id="contact-content">
        <p>To receive invitations for future exhibitions and email updates about
news and more please sign up for our mailing list.</p>
        <form id="mailing-list-form" action="" method="post">
            <input type="text" name="mailing-list-name" placeholder="Full name" required><br>
            <input type="email" name="mailing-list-email" placeholder="Email" required><br>
            <input type="submit" name="mailing-list-submit" value="submit">
        </form>
        <hr>
        <p>Direct inquiries to <a href="javascript:window.location.href = 'mailto:' + ['info','madisongallery.com'].join('@')">info<!---->@<!---->madisongallery.com</a>.</p>
    </div>
</div>
<?php 
    the_content();
?>