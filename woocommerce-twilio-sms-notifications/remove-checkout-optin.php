<?php // only copy if needed

/**
 * Removes Twilio input fields from checkout, allowing it to be used for admin alerts only.
 * Customers will not receive any notifications or be able to opt into them.
 */

function sv_wc_twilio_sms_remove_input_fields() {

	if ( ! function_exists( 'wc_twilio_sms' ) ) {
		return;
	}

	remove_action( 'woocommerce_after_checkout_billing_form', array( wc_twilio_sms(), 'add_opt_in_checkbox' ) );
	remove_action( 'woocommerce_checkout_update_order_meta',  array( wc_twilio_sms(), 'process_opt_in_checkbox' ) );
}
add_action( 'init', 'sv_wc_twilio_sms_remove_input_fields' );
