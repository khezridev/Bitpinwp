<?php

class Bitpinwp_API_Token extends Bitpinwp_Base_API {

	public function __construct() {
		$this->get_token();
	}

	public function get_token() {

		$this->url( BITPINWP_API_ADDRESS.'v1/usr/api/login/' )
		     ->data( $this->get_api_key() )
		     ->method( 'post' )
		     ->send();
		$this->close();
	}

	public function get_api_key() {

		$data = get_option('bitpinwp_options');

		$data = [
			'api_key'    => $data['api_key'],
			'secret_key' =>$data['secret_key']
		];

		return json_encode( $data );
	}
}