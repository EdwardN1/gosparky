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

<div id="footer-opt-in">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-6 medium-6 small-12 text-right">
                Subscribe to our newsletter for exclusive offers and promotions
            </div>
            <div class="cell large-6 medium-6 small-12 text-center">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/subscribe-icon.png'; ?>"/>
            </div>
        </div>
    </div>
</div>

<footer class="footer" role="contentinfo">

    <div class="inner-footer grid-x">

        <div class="small-12 medium-12 large-12 cell">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-3 medium-6 small-12">
                        <div class="logo">
                            <a href="/"><img
                                        src="<?php echo get_template_directory_uri() . '/assets/images/Logo-White-on-Blue.png'; ?>"></a>
                        </div>
                        <div class="tel">
                            <a href="tel:08001120090">08001120090</a>
                        </div>
                        <div class="email">
                            <a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a>
                        </div>
                        <div class="address">
                            Unit 5 & 6 Ravenna Point, Terminus Road,
                            Chichester, West Sussex, PO19 8GS
                        </div>
                    </div>
                    <div class="cell large-3 medium-6 small-12">
                        <div class="heading">
                            Information
                        </div>
                        <nav role="navigation">
                            <?php joints_footer_links(); ?>
                        </nav>
                    </div>
                    <div class="cell large-3 medium-6 small-12">
                        <div class="heading">
                            Information
                        </div>
                        <div class="payment-logos">
                            <div class="grid-x">
                                <div class="cell large-4 medium-4 small-4">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Visa.svg'; ?>">
                                </div>
                                <div class="cell large-4 medium-4 small-4">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/mastercard.svg'; ?>">
                                </div>
                                <div class="cell large-4 medium-4 small-4">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/maestro.svg'; ?>">
                                </div>
                                <div class="cell large-4 medium-4 small-4">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/paypal.svg'; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="social">
                            <div class="heading">
                                Follow Us
                            </div>
                            <div class="grid-x">
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Facebook.svg'; ?>"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Twitter.svg'; ?>"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Youtube.svg'; ?>"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Linkedin.svg'; ?>"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Google.svg'; ?>"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell large-3 medium-6 small-12">
                        <div class="chat">
                            <span>Click for:</span><br>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Livechat.svg'; ?>"><br>
                            <span>Monday to Friday</span><span class="bold">7am - 6pm</span>
                        </div>
                        <div class="charity">
                            Supporting the:<br>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/emily-trans-white.png'; ?>">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="small-12 medium-12 large-12 cell copyright-row">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-6 medium-6 small-12 text-left">
                        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> Go-Sparky.co.uk Ltd and its registered trademarks all rights reserved. Company No. 11303375</p>
                    </div>
                    <div class="cell large-6 medium-6 small-12 text-right">
                        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> This website was designed and built by <a href="https://ng15.co.uk" target="_blank">NG15 Ltd</a></p>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- end #inner-footer -->

</footer> <!-- end .footer -->

</div>  <!-- end .off-canvas-content -->

</div> <!-- end .off-canvas-wrapper -->

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->