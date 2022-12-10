<?php

class Bitpinwp_API_Markets extends Bitpinwp_Base_API {

	public function __construct( $access_key ) {
		$this->access( $access_key );
		$this->get_markets();
	}


	public function get_markets() {

		$this->url( BITPINWP_API_ADDRESS.'v1/mkt/markets/' )
		     ->send();
		$this->close();
	}

}