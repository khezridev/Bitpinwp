<?php

class Bitpinwp_Rest_Api {

	public function __construct() {
		$this->init();
	}

	public function init() {

		add_action( 'rest_api_init', [ $this, 'register_bitpinwp_api' ] );
	}

	public function register_bitpinwp_api() {

		register_rest_route( 'bitpinwp/v1', '/markets', array(

			'methods'  => WP_REST_Server::READABLE,
			'callback' => [ $this, 'make_data' ],
		) );
	}

	public function make_data( WP_REST_Request $data ) {

		return Bitpinwp::get_data();

	}
}