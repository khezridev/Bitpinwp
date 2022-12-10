<?php

class Bitpinwp_Shortcode {

	public function __construct() {
		$this->create();
	}

	/**
	 * Create Bitpin Table Shortcode
	 */
	public function create() {
		add_shortcode( 'bitpinwp', [ $this, 'content' ] );
	}

	/**
	 * Callable Function for [bitpinwp] Shortcode
	 */
	public function content() {

		$this->enqueue_assets();

		ob_start();
		require_once BITPINWP_DIR . 'public' . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'bitpinwp-public-display.php';

		return ob_get_clean();
	}

	/**
	 * Enqueue CSS and JS Owl Carousel files
	 * These files are loaded only when the shortcode is used.
	 */
	public function enqueue_assets() {
		wp_enqueue_script(
			'bitpinwp-jquery-3.5.1',
			BITPINWP_URL . 'public/js/jquery-3.6.1.min.js',
			[],
			BITPINWP_VERSION,
			'all'
		);
		wp_enqueue_script(
			'bitpinwp-jquery.dataTables.min',
			BITPINWP_URL . 'public/js/jquery.dataTables.min.js',
			[ 'jquery' ],
			BITPINWP_VERSION,
			'all'
		);

		wp_enqueue_script(
			'bitpinwp-public',
			BITPINWP_URL . 'public/js/bitpinwp-public.js',
			[ 'jquery' ],
			BITPINWP_VERSION,
			false
		);
		wp_enqueue_style(
			'bitpinwp-jquery.dataTables.min',
			BITPINWP_URL . 'public/css/jquery.dataTables.min.css',
			[],
			BITPINWP_VERSION,
			false
		);
		wp_enqueue_style(
			'bitpinwp-public',
			BITPINWP_URL . 'public/css/bitpinwp-public.css',
			[],
			BITPINWP_VERSION,
			false
		);
	}


}