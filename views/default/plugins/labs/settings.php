<?php
/**
 * Spot Labs Plugin Settings
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 * 
 */

$plugin = $vars['entity'];

// Labs menu item
$enable_labs_menu_item = $plugin->enable_labs_menu_item;

$general_settings_label = elgg_echo('labs:admin:general_settings');

// Max upload size input
$enable_labs_menu_item_label = elgg_echo('labs:admin:enable_labs_menu_item_label');
$enable_labs_menu_item_input = elgg_view('input/dropdown', array(
	'name' => 'params[enable_labs_menu_item]',
	'value' => $enable_labs_menu_item,
	'options_values' => array(
		FALSE => elgg_echo('labs:no'),
		TRUE => elgg_echo('labs:yes')
	)
));

$general_settings_body = <<<HTML
	<div>
		<label>$enable_labs_menu_item_label</label>
		$enable_labs_menu_item_input
	</div>
HTML;

echo elgg_view_module('inline', $general_settings_label, $general_settings_body);