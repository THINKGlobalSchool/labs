<?php
/**
 * Spot Labs requirejs config
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * This file mimics the Elgg_Amd_Config class from Elgg 1.9
 */

// Determine lastcache
if (elgg_is_simplecache_enabled()) {
	// stored in datalist as 'simplecache_lastupdate'
	$lastcache = (int)elgg_get_config('lastcache');
} else {
	$lastcache = 0;
}

// Set viewtype
$viewtype = elgg_get_viewtype();

// baseUrl for requirejs
$sc_root = elgg_get_site_url() . "requirejs/{$lastcache}/{$viewtype}/js/";

// Set config - shims and paths need to be regisitered via require_register_js() wrapper
$amd_config = array(
	'baseUrl' => $sc_root,
	'paths' => elgg_get_config('amd_paths'),
	'shim' => elgg_get_config('amd_shim')
);

?>
// <script>
if (typeof require == "undefined") {
	var require = <?php echo json_encode($amd_config); ?>;
}