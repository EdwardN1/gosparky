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
        <div class="cell medium-shrink large-shrink small-12 image">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/prototype/binocular-icon.png'; ?>">
        </div>
        <div class="cell medium-auto large-auto small-12 message">
            <h2>Need help finding something?</h2>
            <p>We can help source the product you want<br>even if we don't stock it!</p>
        </div>
        <div class="cell large-shrink medium-shrink small-12 button-div">
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
            <div class="grid-container main-footer">
                <div class="grid-x">
                    <div class="cell large-3 medium-6 small-12 col1">
                        <div class="logo">

                            <?php if ( have_rows( 'general_settings', 'option' ) ) : ?>
                                <?php while ( have_rows( 'general_settings', 'option' ) ) : the_row(); ?>
                                    <?php $footer_logo = get_sub_field( 'footer_logo' ); ?>
                                    <?php if ( $footer_logo ) : ?>
                                        <a href="/"><img src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" /></a>
                                    <?php else: ?>
                                        <a href="/"><img
                                                    src="<?php echo get_template_directory_uri() . '/assets/images/gosparky-logo.png'; ?>"></a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <a href="/"><img
                                            src="<?php echo get_template_directory_uri() . '/assets/images/gosparky-logo.png'; ?>"></a>
                            <?php endif; ?>
                        </div>

                        <?php if ( have_rows( 'general_settings', 'option' ) ) : ?>
                            <?php while ( have_rows( 'general_settings', 'option' ) ) : the_row(); ?>
                                <?php $telephone_number = get_sub_field( 'telephone_number' ); ?>
                                <?php $email_address = get_sub_field( 'email_address' ); ?>
                                <?php if ( $telephone_number != '' ) : ?>
                                    <div class="tel"><a href="tel:<?php echo str_replace(' ', '', $telephone_number);?>"><?php the_sub_field( 'telephone_number' ); ?></a></div>
                                <?php else: ?>
                                    <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                                <?php endif; ?>
                                <?php if ( $email_address != '' ) : ?>
                                    <div class="email"><a href="mailto:<?php echo $email_address;?>"><?php echo $email_address;?></a></div>
                                <?php else: ?>
                                    <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a></div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                            <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a></div>
                        <?php endif; ?>


                        <!--<div class="tel">
                            <a href="tel:08001120090">08001120090</a>
                        </div>
                        <div class="email">
                            <a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a>
                        </div>-->

                        <?php if ( have_rows( 'general_settings', 'option' ) ) : ?>
                            <?php while ( have_rows( 'general_settings', 'option' ) ) : the_row(); ?>
                                <?php $address = get_sub_field( 'address' ); ?>
                                <?php if ( $address != '' ) : ?>
                                    <div class="address">
                                        <?php echo $address; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="address">
                                        Unit 5 & 6 Ravenna Point, Terminus Road,
                                        Chichester, West Sussex, PO19 8GS
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="address">
                                Unit 5 & 6 Ravenna Point, Terminus Road,
                                Chichester, West Sussex, PO19 8GS
                            </div>
                        <?php endif; ?>


                    </div>
                    <div class="cell large-3 medium-6 small-12 col2">
                        <div class="heading">
                            Information
                        </div>
                        <nav role="navigation">
                            <?php joints_footer_links(); ?>
                        </nav>
                    </div>
                    <div class="cell large-3 medium-6 small-12 col3">
                        <div class="heading">
                            Payments
                        </div>
                        <div class="payment-logos">
                            <div class="grid-x">
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Visa.svg'; ?>" class="visa">
                                </div>
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/mastercard.svg'; ?>" class="mastercard">
                                </div>
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/maestro.svg'; ?>" class="maestro">
                                </div>
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/paypal.svg'; ?>" class="paypal">
                                </div>
                            </div>
                        </div>
                        <div class="social">
                            <div class="heading">
                                Follow Us
                            </div>
                            <div class="grid-x">
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Facebook.svg'; ?>" class="social-icon"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Twitter.svg'; ?>" class="social-icon"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Youtube.svg'; ?>" class="social-icon"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Linkedin.svg'; ?>" class="social-icon"></a>
                                </div>
                                <div class="cell auto">
                                    <a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Google.svg'; ?>" class="social-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell large-3 medium-6 small-12 col4">
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