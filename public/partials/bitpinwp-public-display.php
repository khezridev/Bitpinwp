<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://khezri.ir
 * @since      1.0.0
 *
 * @package    Bitpinwp
 * @subpackage Bitpinwp/public/partials
 */

?>

<table id="bitpinwp_tbl_markets" class="display">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>ارز دیجیتال</th>
        <th>قیمت</th>
        <th>تغییر 24 ساعت</th>
    </tr>
    </thead>
    <tbody>

	<?php
	$counter = 1;
	$markets = Bitpinwp::get_data();

	foreach ( $markets['results'] as $market ) { ?>

        <tr>

            <td class="bitpinwp-text"><?php echo $counter ?></td>
            <td class="bitpinwp-text"><?php echo $market['currency1']['title_fa'].'<span class="short-name">'. str_replace('_','/',$market['code']).'</span>' ?></td>
            <td class="bitpinwp-text"><?php echo number_format( $market['price'] ) ?></td>
            <td class="bitpinwp-text"><?php echo $market['price_info']['change'] ?></td>
        </tr>

		<?php
		$counter ++;
	}
	?>


    </tbody>
</table>