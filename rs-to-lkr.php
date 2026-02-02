<?php
/**
 * Plugin Name: Rs to LKR
 * Description: A simple WooCommerce plugin that changes price display from Rs to LKR.
 * Version: 1.0.0
 * Author: Damitha Nayanajith
 * License: GPL-2.0+
 */

// Change the currency symbol to LKR and format it
function custom_woocommerce_currency_symbol( $currency_symbol, $currency ) {
    if ( 'LKR' === $currency ) {
        $currency_symbol = 'LKR';
    }
    return $currency_symbol;
}
add_filter( 'woocommerce_currency_symbol', 'custom_woocommerce_currency_symbol', 10, 2 );

// Modify the price format to show LKR 1500 without period
function custom_woocommerce_price_format( $format, $currency_pos ) {
    if ( 'LKR' === get_woocommerce_currency() ) {
        if ( 'left' === $currency_pos ) {
            $format = '%1$s %2$s';  // LKR 1500
        } else {
            $format = '%2$s %1$s';  // 1500 LKR
        }
    }
    return $format;
}
add_filter( 'woocommerce_price_format', 'custom_woocommerce_price_format', 10, 2 );
