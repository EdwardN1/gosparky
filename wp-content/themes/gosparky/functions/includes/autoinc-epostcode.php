<?php
add_action('woocommerce_before_checkout_billing_form', 'gosparky_epostcode_form');

function gosparky_epostcode_form()
{
    ob_start();
    ?>
    <div id="postcode-lookup">
        <form method="post" ID="postcode-lookup-form">
            <script language="JavaScript" src="<?php echo get_template_directory_uri(); ?>/vendor/epostcode/epostcodeFields.js"></script>
            <!--<script language=javascript src="https://ws.epostcode.com/popup/ePostcodeDemoFields.js"></script>-->
            <script language=javascript src="https://ws.epostcode.com/popup/ePostcodeProxy.js"></script>
            <input id=epcServiceName type=hidden value=SearchMulti name=epcServiceName>
            <input id=epcAccountName type=hidden value=<?php echo get_field('epostcode_account_name', 'option');?>name=epcAccountName>
            <input id=epcGUID type=hidden value=<?php echo get_field('epostcode_guid', 'option');?> name=epcGUID>
            <input id=epcIPAddress type=hidden name=epcIPAddress>

            <p class="form-row form-row-wide">
                <label for="epcSearchPostcode">Search For Postcode</label>
                <span class="woocommerce-input-wrapper"><input class="input-text" name="epcSearchPostcode" type="text" id="epcSearchPostcode"></span>
            </p>
            <p class="form-row form-row-wide">
                <input id=epcFindAddresses class="button" onclick=javascript:GetAddressList(); type=button value="Find Address" name=epcFindAddresses>
            </p>
            <p class="form-row form-row-wide">
                <select id=epcAddressList style="WIDTH: 100%" name=epcAddressList></select>
            </p>

            <p class="form-row form-row-wide">
                <input id=epcGetAddress class="button" onclick=javascript:GetAddress(); type=button value="Use Selected Address" name=epcGetAddress>
            </p>
        </form>
    </div>
    <?php
    echo ob_get_clean();
}