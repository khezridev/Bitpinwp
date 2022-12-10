<?php

class Bitpinwp_Settings {

	private $options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'Bitpinwp_setting_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	public function Bitpinwp_setting_page() {
		add_menu_page(
			'تنظیمات بیت پین', // page_title
			'بیت پین', // menu_title
			'manage_options', // capability
			'Bitpinwp-Settings', // menu_slug
			array( $this, 'create_admin_page' ), // function
			'dashicons-money-alt', // icon_url
			99 // position
		);
	}

	public function create_admin_page() {
		$this->options = get_option( 'bitpinwp_options' ); ?>

        <div class="wrap">
            <h2>تنظیمات پلاگین بیت پین</h2>
            <h3 id="cee8b80267">احراز هویت</h3>
            <p>ابتدا باید در وب&zwnj;سایت یا اپلیکیشن بیت&zwnj;پین به <a target="_blank" href="https://bitpin.ir/api-v1">بخش API</a>مراجعه کنید. </p>
            <p>در این بخش باید یک جفت <code>API KEY</code> و <code>SECRET KEY</code> ایجاد کنید. برای این کار نیاز است
                IP هایی که در آینده برای فراخوانی API ها از آن استفاده می&zwnj;کنید را تعیین کنید. </p>
            <p>هر جفت کلید (KEY) قابل تخصیص به یک لیست از IP ها است. از این جفت کلید برای دریافت توکن&zwnj;های احراز
                هویت استفاده خواهد شد.</p>

			<?php settings_errors(); ?>

            <form method="post" action="options.php">
				<?php
				settings_fields( 'bitpinwp_option_group' );
				do_settings_sections( 'bitpinwp_settings' );
				submit_button();
				?>
            </form>
        </div>
	<?php }

	public function page_init() {
		register_setting(
			'bitpinwp_option_group', // option_group
			'bitpinwp_options', // option_name
			array( $this, 'sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'bitpinwp_setting_section', // id
			'Settings', // title
			array( $this, 'section_info' ), // callback
			'bitpinwp_settings' // page
		);

		add_settings_field(
			'api_key', // id
			'API Key', // title
			array( $this, 'api_key_callback' ), // callback
			'bitpinwp_settings', // page
			'bitpinwp_setting_section' // section
		);

		add_settings_field(
			'secret_key', // id
			'Secret Key', // title
			array( $this, 'secret_key_callback' ), // callback
			'bitpinwp_settings', // page
			'bitpinwp_setting_section' // section
		);

		add_settings_field(
			'update_time', // id
			'زمان بروزرسانی', // title
			array( $this, 'update_time_callback' ), // callback
			'bitpinwp_settings', // page
			'bitpinwp_setting_section' // section
		);
	}

	public function sanitize( $input ) {
		$sanitary_values = array();
		if ( isset( $input['api_key'] ) ) {
			$sanitary_values['api_key'] = sanitize_text_field( $input['api_key'] );
		}

		if ( isset( $input['secret_key'] ) ) {
			$sanitary_values['secret_key'] = sanitize_text_field( $input['secret_key'] );
		}

		if ( isset( $input['update_time'] ) ) {
			$sanitary_values['update_time'] = $input['update_time'];
		}

		return $sanitary_values;
	}

	public function section_info() {

	}

	public function api_key_callback() {
		printf(
			'<input class="regular-text" type="text" name="bitpinwp_options[api_key]" id="api_key" value="%s">',
			isset( $this->options['api_key'] ) ? esc_attr( $this->options['api_key'] ) : ''
		);
	}

	public function secret_key_callback() {
		printf(
			'<input class="regular-text" type="text" name="bitpinwp_options[secret_key]" id="secret_key" value="%s">',
			isset( $this->options['secret_key'] ) ? esc_attr( $this->options['secret_key'] ) : ''
		);
	}

	public function update_time_callback() {
		?> <select name="bitpinwp_options[update_time]" id="update_time">
			<?php $selected = ( isset( $this->options['update_time'] ) && $this->options['update_time'] === '$this->options' ) ? 'selected' : ''; ?>
            <option value="30" <?php echo $selected; ?>>هر 30 دقیقه</option>
			<?php $selected = ( isset( $this->options['update_time'] ) && $this->options['update_time'] === '60' ) ? 'selected' : ''; ?>
            <option value="60" <?php echo $selected; ?>>هر ساعت</option>
			<?php $selected = ( isset( $this->options['update_time'] ) && $this->options['update_time'] === '120' ) ? 'selected' : ''; ?>
            <option value="120" <?php echo $selected; ?>>هر 2 ساعت</option>
			<?php $selected = ( isset( $this->options['update_time'] ) && $this->options['update_time'] === '360' ) ? 'selected' : ''; ?>
            <option value="360" <?php echo $selected; ?>>هر 6 ساعت</option>
			<?php $selected = ( isset( $this->options['update_time'] ) && $this->options['update_time'] === '720' ) ? 'selected' : ''; ?>
            <option value="720" <?php echo $selected; ?>>هر 12 ساعت</option>
			<?php $selected = ( isset( $this->options['update_time'] ) && $this->options['update_time'] === '1440' ) ? 'selected' : ''; ?>
            <option value="1440" <?php echo $selected; ?>> هر 24 ساعت</option>
        </select> <?php
	}

}