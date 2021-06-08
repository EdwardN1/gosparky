<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<div id="footer-top" class="grid-container">
    <div class="grid-x">
        <div class="large-6 medium-6 small-12">
            <a href="#" class="button blue">REQUEST A QUOTE</a>
        </div>
        <div class="large-6 medium-6 small-12 text-right">
            <a href="#" class="button light-blue">REQUEST A CALL BACK</a>
        </div>
    </div>
</div>

<div id="footer-trustpilot" class="grid-container">

        <div class="grid-x">
            <div class="large-6 medium-6 small-12 text-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/custom-love-icon.png'; ?>">
            </div>
            <div class="large-6 medium-6 small-12 text-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/trustpilot-icon.png'; ?>">
            </div>
        </div>

</div>

<div id="footer-contact-sales" class="grid-container">
    <div class="grid-x">
        <div class="cell shrink">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/binocular-icon.png'; ?>">
        </div>
        <div class="cell auto message">
            <h2>Need help finding something?</h2>
            <p>We can help source the product you want<br>even if we don't stock it!</p>
        </div>
        <div class="cell shrink button-div">
            <a href="#" class="button pill white">CONTACT SALES</a>
        </div>
    </div>
</div>

<footer class="footer" role="contentinfo">

    <div class="inner-footer grid-x grid-margin-x grid-padding-x">

        <div class="small-12 medium-12 large-12 cell">
            <nav role="navigation">
                <?php joints_footer_links(); ?>
            </nav>
        </div>

        <div class="small-12 medium-12 large-12 cell">
            <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
        </div>

    </div> <!-- end #inner-footer -->

</footer> <!-- end .footer -->

</div>  <!-- end .off-canvas-content -->

</div> <!-- end .off-canvas-wrapper -->

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->