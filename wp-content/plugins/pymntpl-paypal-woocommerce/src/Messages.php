<?php


namespace PaymentPlugins\WooCommerce\PPCP;


class Messages {

	private $messages = [];

	public function __construct() {
		$this->initialize();
	}

	private function initialize() {
		$this->messages = [
			'terms'             => __( 'Please check the terms and conditions before proceeding.', 'pymntpl-paypal-woocommerce' ),
			'invalid_client_id' => __( 'Invalid PayPal client ID. Please check your API Settings.', 'pymntpl-paypal-woocommerce' )
		];
	}

	public function get_messages() {
		return apply_filters( 'wc_ppcp_get_messages', $this->messages );
	}

}