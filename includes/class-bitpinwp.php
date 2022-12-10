<?php

class Bitpinwp {

	public static function init() {

		if ( is_admin() ) {
			new Bitpinwp_Settings();
		}

		new Bitpinwp_Shortcode;
		new Bitpinwp_Rest_Api;

	}

	public static function run() {

		$token   = new Bitpinwp_API_Token();
		$markets = new Bitpinwp_API_Markets( $token->content );
		Bitpinwp::set_transient( $markets->content );

		return $markets->content;

	}

	public static function get_data() {

		$data_markets = get_transient( 'bitpinwp_markets' );
		if ( WP_DEBUG or false === ( $data_markets ) ) {
			$data_markets = Bitpinwp::run();
		}

		return json_decode( $data_markets, true );
	}

	public static function set_transient( $content ) {
		$schedule_time = get_option( 'bitpinwp_options' );
		set_transient( 'bitpinwp_markets', $content, $schedule_time['update_time'] * 60 ); // Minutes * Secounds = Expire time transient
	}

}