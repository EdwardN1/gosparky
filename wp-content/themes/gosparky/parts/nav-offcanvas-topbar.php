<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar" id="top-bar-menu">
    <div class="grid-container">

        <div class="">
            <div class="grid-x">
                <div class="cell auto">
                    <div class="show-for-large">
                        <?php joints_top_nav(); ?>
                    </div>
                    <div class="hide-for-large">
                        <a href="tel:08001120090" class="tel">0800 112 00 90</a>
                    </div>
                </div>
                <div class="cell shrink tax-display-setting">
                    <div class="grid-x">
                        <div class="cell shrink eBold">Ex VAT</div>
                        <div class="cell shrink">
                            <div class="switch small">
                                <input class="switch-input" id="vatSwitch" type="checkbox" name="vatSwitch">
                                <label class="switch-paddle" for="vatSwitch">
                                    <span class="show-for-sr">VAT switch</span>
                                </label>
                            </div>
                        </div>
                        <div class="cell shrink iBold">Inc VAT</div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function (e) {
                let vc = Cookies.get('vCook')
                if (vc) {
                    if (vc == 'inc') {
                        jQuery('#vatSwitch').prop('checked', true);
                        jQuery('.ex-tax').hide();
                        jQuery('.inc-tax').show();
                        jQuery('.iBold').css('font-weight', 'bold');
                        jQuery('.eBold').css('font-weight', 'normal');
                    } else {
                        jQuery('#vatSwitch').prop('checked', false);
                        jQuery('.inc-tax').hide();
                        jQuery('.ex-tax').show();
                        jQuery('.iBold').css('font-weight', 'normal');
                        jQuery('.eBold').css('font-weight', 'bold');
                    }
                } else {
                    Cookies.set('vCook', 'ex')
                }
                jQuery('#vatSwitch').on('change', function (e) {
                    let vCook = Cookies.get('vCook');
                    if (vCook == 'inc') {
                        jQuery('#vatSwitch').prop('checked', false);
                        Cookies.set('vCook', 'ex');
                        jQuery('.inc-tax').hide();
                        jQuery('.ex-tax').show();
                        jQuery('.iBold').css('font-weight', 'normal');
                        jQuery('.eBold').css('font-weight', 'bold');
                        //window.console.log('set to ex');
                    } else {
                        jQuery('#vatSwitch').prop('checked', true);
                        Cookies.set('vCook', 'inc');
                        jQuery('.ex-tax').hide();
                        jQuery('.inc-tax').show();
                        jQuery('.iBold').css('font-weight', 'bold');
                        jQuery('.eBold').css('font-weight', 'normal');
                        //window.console.log('set to inc');

                    }
                });
            });
        </script>
        <div class="float-right hide-for-large" style="display: none;">
            <ul class="menu">
                <!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
                <li><a data-toggle="off-canvas"><?php _e('Menu', 'jointswp'); ?></a></li>
            </ul>
        </div>
    </div>
</div>

<!--
<div class="grid-container">
    <ul class="menu">
        <div class="cell shrink">
            <ul class="menu">
                <?php
/*                if (has_custom_logo()) { */ ?>
                    <li>
                        <?php /*the_custom_logo(); */ ?>
                    </li>
                    <?php
/*                } else {
                    */ ?>
                    <li><a href="<?php /*echo home_url(); */ ?>" class="logo"><?php /*bloginfo('name'); */ ?></a></li>
                    <?php
/*                }
                */ ?>
            </ul>
        </div>
    </ul>
</div>-->

