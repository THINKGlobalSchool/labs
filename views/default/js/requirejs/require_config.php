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
 */

// Build baseUrl
if (elgg_is_simplecache_enabled()) {
	// stored in datalist as 'simplecache_lastupdate'
	$lastcache = (int)elgg_get_config('lastcache');
} else {
	$lastcache = 0;
}

$viewtype = elgg_get_viewtype();
$sc_root = elgg_get_site_url() . "requirejs/{$lastcache}/{$viewtype}/js/";

$amd_config = array(
	'baseUrl' => $sc_root,
	// 'paths' => array()
);

?>
// <script>
if (typeof require == "undefined") {
	var require = <?php echo json_encode($amd_config); ?>;
}