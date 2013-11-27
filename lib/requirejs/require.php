<?php
/**
 * Spot Labs RequireJS helper lib
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */

/**
 * Add requirejs dependency
 */
function elgg_require_js($name) {
	global $CONFIG;

	$CONFIG->amd_dependancies[] = $name;
}

/**
 * Get requirejs dependencies
 */
function require_get_depenencies() {
	return elgg_get_config('amd_dependancies');
}

/**
 * Requirejs wrapper for elgg_register_js
 *
 * @see elgg_register_js
 */
function require_register_js($name, $url, $location = 'head', $priority = null) {
	if (is_array($url)) {
		global $CONFIG;

		$config = $url;

		// Extract vars to be used by elgg_register_js
		$url = elgg_extract('src', $config);
		$location = elgg_extract('location', $config, 'footer');
		$priority = elgg_extract('priority', $config);
		
		// Register requirejs shim
		$CONFIG->amd_shim[$name] = array(
			'deps' => elgg_extract('deps', $config, array()),
			'exports' => elgg_extract('exports', $config),
		);

		// Register requirejs path
		$path = elgg_normalize_url(elgg_extract('src', $config));
		if (preg_match("/\.js$/", $path)) {
			$path = preg_replace("/\.js$/", '', $path);
		}

		$CONFIG->amd_paths[$name] = $path;
	}

	// Call regular elgg_register_js
	elgg_register_js($name, $url, $location, $priority);
}