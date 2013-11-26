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

// Need to build simplecache/js root url
$lastcache = (int)elgg_get_config('lastcache');
$viewtype = elgg_get_viewtype();

if (elgg_is_simplecache_enabled()) {
	$sc_root = elgg_normalize_url("/cache/js/{$viewtype}/");
} else {
	$sc_root = elgg_get_site_url() . '/';
}

// Create new config object
$obj = new Elgg_Amd_Config();
$obj->setBaseUrl($sc_root . "js/");

// Get externals map from config
$externals_map = elgg_get_config('externals_map');

// Filter out un-loaded items
$callback = "return \$v->loaded == true;";
$items = array_filter($externals_map['js'], create_function('$v', $callback));

// Set key/value: Name => URL
if ($items) {
	array_walk($items, create_function('&$v,$k', '$v = $v->url;'));
} else {
	$items = array();
}

// Register AMD for each external if possible
foreach ($items as $name => $item) {
	if (is_array($item)) {
		$obj->setShim($name, $item);
		$obj->setPath($name, elgg_normalize_url($url));
	}
}

$amdConfig = $obj->getConfig();

// Deps are loaded in page/elements/foot with require([...])
unset($amdConfig['deps']);
?>
// <script>
if (typeof require == "undefined") {
	var require = <?php echo json_encode($amdConfig); ?>;
}
