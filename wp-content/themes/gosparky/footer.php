<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<?php
$show_quote_and_callback_row = get_field('show_quote_and_callback_row', 'option');
$show_trustpilot_row = get_field('show_trustpilot_row', 'option');
$show_sales_contact_row = get_field('show_sales_contact_row', 'option');
$show_newsletter_signups = get_field('show_newsletter_signups', 'option');
$show_ecologi = get_field('show_ecologi', 'option');
?>
<?php if ($show_quote_and_callback_row == 1): ?>
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
<?php endif; ?>

<?php if ($show_trustpilot_row == 1): ?>
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
<?php endif; ?>
<?php if ($show_sales_contact_row == 1): ?>
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
                <a href="<?php the_field('sales_contact_link', 'option'); ?>" class="button pill white">CONTACT
                    SALES</a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($show_ecologi == 1) : ?>
    <?php $ecologi = gosparky_get_ecologi_impact(); ?>
    <?php $carbonOffset = $ecologi['carbonOffset'];?>
    <?php if($carbonOffset==0) {$carbonOffset = $ecologi['trees'] * 5;} ?>
    <?php $ecologi_background_image = get_field( 'ecologi_background_image', 'option' ); ?>
    <?php if ( $ecologi_background_image ) : ?>
    <div id="footer-ecologi-background-row" class="grid-container">
        <img src="<?php echo esc_url( $ecologi_background_image['url'] ); ?>" alt="<?php echo esc_attr( $ecologi_background_image['alt'] ); ?>" />
        <!--<div class="trees"><?php /*echo (string)$ecologi['trees']; */?></div>
        <div class="carbonOffset"><?php /*echo (string)$ecologi['carbonOffset']; */?>kg</div>-->
        <div class="tree-data">
            <div class="grid-x">
                <div class="cell auto"></div>
                <div class="cell tree shrink"><img src="<?php echo get_template_directory_uri() . '/assets/images/tree.png'; ?>"></div>
                <div class="cell trees shrink text-right"><?php echo (string)$ecologi['trees']; ?></div>
                <div class="cell trees-planted shrink"><img src="<?php echo get_template_directory_uri() . '/assets/images/trees-planted.png'; ?>"></div>
                <div class="cell co2 shrink"><img src="<?php echo get_template_directory_uri() . '/assets/images/co2.png'; ?>"></div>
                <div class="cell carbonOffset shrink text-right"><?php echo $carbonOffset; ?>kg</div>
                <div class="cell carbon-captured shrink"><img src="<?php echo get_template_directory_uri() . '/assets/images/carbon-captured.png'; ?>"></div>
                <div class="cell auto"></div>
            </div>
        </div>
    </div>
    <?php else:?>
        <div id="footer-ecologi-row" class="grid-container">
            <div class="background">
                <div class="grid-x">
                    <div class="cell auto"></div>
                    <div class="cell shrink">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/ecologi.svg'; ?>"/>
                    </div>
                    <div class="cell shrink h2"> Live Impact</div>
                    <div class="cell auto"></div>
                </div>

                <div class="grid-x">
                    <div class="cell large-6 medium-6 small-6 text-center h2">
                        Tree Count:<br><?php echo (string)$ecologi['trees']; ?>
                    </div>
                    <div class="cell large-6 medium-6 small-6 text-center h2">
                        Carbon offset (tonnes):<br><?php echo (string)$ecologi['carbonOffset']; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($show_newsletter_signups == 1): ?>
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
<?php else: ?>
    <div class="spacer"></div>
<?php endif; ?>
<footer class="footer" role="contentinfo">

    <div class="inner-footer grid-x">

        <div class="small-12 medium-12 large-12 cell">
            <div class="grid-container main-footer">
                <div class="grid-x">
                    <?php
                    $show_4th_footer_column = get_field('show_4th_footer_column', 'option');
                    $footer_col_classes = 'cell large-4 medium-4 small-12 ';
                    if ($show_4th_footer_column == 1) {
                        $footer_col_classes = 'cell large-3 medium-6 small-12 ';
                    }
                    ?>
                    <div class="<?php echo $footer_col_classes; ?>col1">
                        <div class="logo">

                            <?php if (have_rows('general_settings', 'option')) : ?>
                                <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                    <?php $footer_logo = get_sub_field('footer_logo'); ?>
                                    <?php if ($footer_logo) : ?>
                                        <a href="/"><img src="<?php echo esc_url($footer_logo['url']); ?>"
                                                         alt="<?php echo esc_attr($footer_logo['alt']); ?>"/></a>
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

                        <?php if (have_rows('general_settings', 'option')) : ?>
                            <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                <?php $telephone_number = get_sub_field('telephone_number'); ?>
                                <?php $email_address = get_sub_field('email_address'); ?>
                                <?php if ($telephone_number != '') : ?>
                                    <div class="tel"><a
                                                href="tel:<?php echo str_replace(' ', '', $telephone_number); ?>"><?php the_sub_field('telephone_number'); ?></a>
                                    </div>
                                <?php else: ?>
                                    <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                                <?php endif; ?>
                                <?php if ($email_address != '') : ?>
                                    <div class="email"><a
                                                href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>
                                    </div>
                                <?php else: ?>
                                    <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="tel"><a href="tel:08001120090">0800 112 00 90</a></div>
                            <div class="email"><a href="mailto:sales@gosparky.co.uk">sales@gosparky.co.uk</a></div>
                        <?php endif; ?>


                        <?php if (have_rows('general_settings', 'option')) : ?>
                            <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                <?php $address = get_sub_field('address'); ?>
                                <?php if ($address != '') : ?>
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
                    <div class="<?php echo $footer_col_classes; ?>col2">
                        <div class="heading">
                            Information
                        </div>
                        <nav role="navigation">
                            <?php joints_footer_links(); ?>
                        </nav>
                    </div>
                    <div class="<?php echo $footer_col_classes; ?>col3">
                        <div class="heading">
                            Payments
                        </div>
                        <div class="payment-logos">
                            <div class="grid-x">
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/Visa.svg'; ?>"
                                         class="visa">
                                </div>
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/mastercard.svg'; ?>"
                                         class="mastercard">
                                </div>
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/maestro.svg'; ?>"
                                         class="maestro">
                                </div>
                                <div class="cell large-4 medium-4 small-3">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/paypal.svg'; ?>"
                                         class="paypal">
                                </div>
                            </div>
                        </div>
                        <div class="social">
                            <div class="heading">
                                Follow Us
                            </div>
                            <div class="grid-x">
                                <?php
                                $facebook = get_field('facebook', 'option');
                                $twitter = get_field('twitter', 'option');
                                $youtube = get_field('youtube', 'option');
                                $linkedin = get_field('linkedin', 'option');
                                $google = get_field('google', 'option');
                                ?>
                                <?php if ($facebook != ''): ?>
                                    <div class="cell shrink">
                                        <a href="<?php echo $facebook; ?>"><img
                                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/Facebook.svg'; ?>"
                                                    class="social-icon"></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($twitter != ''): ?>
                                    <div class="cell shrink">
                                        <a href="<?php echo $twitter; ?>"><img
                                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/Twitter.svg'; ?>"
                                                    class="social-icon"></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($youtube != ''): ?>
                                    <div class="cell shrink">
                                        <a href="<?php echo $youtube; ?>"><img
                                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/Youtube.svg'; ?>"
                                                    class="social-icon"></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($linkedin != ''): ?>
                                    <div class="cell shrink">
                                        <a href="<?php echo $linkedin; ?>"><img
                                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/Linkedin.svg'; ?>"
                                                    class="social-icon"></a>
                                    </div>
                                <?php endif; ?>
                                <?php if ($google != ''): ?>
                                    <div class="cell shrink">
                                        <a href="<?php echo $google; ?>"><img
                                                    src="<?php echo get_template_directory_uri() . '/assets/images/svg/Google.svg'; ?>"
                                                    class="social-icon"></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($show_4th_footer_column == 1): ?>
                        <div class="<?php echo $footer_col_classes; ?>col4">
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
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="small-12 medium-12 large-12 cell copyright-row">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-8 medium-8 small-12 text-left">
                        <?php if (have_rows('general_settings', 'option')) : ?>
                            <?php while (have_rows('general_settings', 'option')) : the_row(); ?>
                                <?php $copyright = get_sub_field('copyright'); ?>
                                <?php if ($copyright != ''): ?>
                                    <p class="source-org copyright">
                                        &copy; <?php echo date('Y'); ?> <?php echo $copyright; ?></p>
                                <?php else: ?>
                                    <p class="source-org copyright">&copy; <?php echo date('Y'); ?> A Company Ltd and
                                        its registered trademarks all rights reserved. Company No. XXXXXXXX</p>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <div class="cell large-4 medium-4 small-12 text-right">
                        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> This website was designed and
                            built by <a href="https://ng15.co.uk" target="_blank">NG15 Ltd</a></p>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- end #inner-footer -->

</footer> <!-- end .footer -->

</div>  <!-- end .off-canvas-content -->

</div> <!-- end .off-canvas-wrapper -->

<?php if (have_rows('google_settings', 'option')) : ?>
    <?php while (have_rows('google_settings', 'option')) : the_row(); ?>
        <?php the_sub_field('google_analytics'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html> <!-- end page -->