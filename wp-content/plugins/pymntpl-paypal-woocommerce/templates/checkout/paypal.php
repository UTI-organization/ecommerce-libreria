<?php
/**
 * @var \PaymentPlugins\WooCommerce\PPCP\Payments\Gateways\AbstractGateway $gateway
 * @var \PaymentPlugins\WooCommerce\PPCP\Assets\AssetsApi                  $assets
 * @var bool                                                               $connected
 * @since 1.0.0
 */

?>
<div class="wc-ppcp-payment-method__container">
	<?php if ( $connected ): ?>
		<?php if ( $gateway->get_option( 'checkout_placement' ) === 'place_order' ): ?>
            <div class="wc-ppcp-popup__container">
                <img src="<?php echo esc_url( $assets->assets_url( 'assets/img/popup.svg' ) ) ?>"/>
                <p>
					<?php esc_html_e( 'Click the PayPal button below to process your order.', 'pymntpl-paypal-woocommerce' ) ?>
                </p>
            </div>
		<?php endif; ?>
        <div class="wc-ppcp-order-review-message__container" style="display: none">
            <div class="wc-ppcp-order-review__message">
				<?php esc_html_e( 'Your PayPal payment method is ready to be processed. Please review your order details then click %s',
					'pymntpl-paypal-woocommerce' ) ?>
            </div>
            <a href="#" class="wc-ppcp-cancel__payment"><?php esc_html_e( 'Cancel', 'pymntpl-paypal-woocommerce' ) ?></a>
        </div>
	<?php else: ?>
        <div class="wc-ppcp-notice__info">
			<?php wc_print_notice( __( 'Please connect your PayPal account before using PayPal.', 'pymntpl-paypal-woocommerce' ), 'error' ) ?>
        </div>
	<?php endif ?>
</div>
