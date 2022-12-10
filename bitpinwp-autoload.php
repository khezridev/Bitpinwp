<?php

class Bitpinwp_Autoload {
	private static $_instance = null;

	private function __construct() {
		spl_autoload_register( [ $this, 'load' ] );
	}

	public static function _instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new Bitpinwp_Autoload();
		}

		return self::$_instance;
	}

	public function load( $class ) {

		$class = strtolower( $class );
		$class = str_replace( '_', '-', $class );
		$class = 'class-' . $class . '.php';

		if ( is_readable( trailingslashit( BITPINWP_DIR . 'includes' ) . $class ) || is_readable( trailingslashit( BITPINWP_DIR . 'includes'.DIRECTORY_SEPARATOR.'BaseClass' ) . $class ) ) {
			if ( file_exists( trailingslashit( BITPINWP_DIR . 'includes' ) . $class ) ) {
				include_once trailingslashit( BITPINWP_DIR . 'includes' ) . $class;
			} elseif ( trailingslashit( BITPINWP_DIR . 'includes'.DIRECTORY_SEPARATOR.'BaseClass' ) . $class ) {
				include_once trailingslashit( BITPINWP_DIR . 'includes'.DIRECTORY_SEPARATOR.'BaseClass' ) . $class;
			}
		}

		return;
	}
}

Bitpinwp_Autoload::_instance();