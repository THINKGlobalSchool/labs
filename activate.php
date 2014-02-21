<?php
/**
 * Spot Labs Plugin Activation Script
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 * 
 */

// Get the plugin entity
$plugin = elgg_get_plugin_from_id('labs');

$defaults = array(
	// Labs menu item
	'enable_labs_menu_item' => false,
);

// Set default config values
foreach ($defaults as $setting => $value) {
	if (!$plugin->getSetting($setting)) {
		$plugin->setSetting($setting, $value);
	}
}