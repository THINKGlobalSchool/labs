<?php
/**
 * Spot Labs
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 * 
 * See README for naming conventions
 */

// Main init
elgg_register_event_handler('init', 'system', 'labs_init');

// Requirejs lab
elgg_register_event_handler('init', 'system', 'requirejs_init', 9999);

// Coolfeature (example) init
elgg_register_event_handler('init', 'system', 'coolfeature_init');

// Init labs plugin
function labs_init() {
	// Register library
	elgg_register_library('elgg:labs', elgg_get_plugins_path() . 'labs/lib/labs.php');
	elgg_load_library('elgg:labs');

	// Extend Main CSS
	elgg_extend_view('css/elgg', 'css/labs/css');

	// Register Main JS lib
	$js = elgg_get_simplecache_url('js', 'labs/labs.js');
	elgg_register_simplecache_view('js/labs/labs.js');
	elgg_register_js('elgg.labs', $js);
	elgg_load_js('elgg.labs');

	// Register main page handler
	elgg_register_page_handler('labs', 'labs_page_handler');
}

// Coolfeature (example init)
function coolfeature_init() {
	// Register library
	elgg_register_library('elgg:coolfeature', elgg_get_plugins_path() . 'labs/lib/coolfeature/lib.php');
	elgg_load_library('elgg:coolfeature');

	// Example feature JS lib init
	$js = elgg_get_simplecache_url('js', 'coolfeature/coolfeature.js');
	elgg_register_simplecache_view('js/coolfeature/coolfeature.js');
	elgg_register_js('elgg.coolfeature', $js);

	// Example vendor JS init
	$js = elgg_get_simplecache_url('js', 'coolfeature/coolvendor.js');
	elgg_register_simplecache_view('js/coolfeature/coolvendor.js');
	elgg_register_js('elgg.coolfeature.coolvendor', $js);

	// Example feature CSS init
	$css = elgg_get_simplecache_url('css', 'coolfeature/coolfeature.css');
	elgg_register_simplecache_view('css/coolfeature/coolfeature.css');
	elgg_register_css('elgg.coolfeature', $css);

	// Example Feature Action
	$action_base = elgg_get_plugins_path() . "labs/actions/coolfeature";
	elgg_register_action('coolfeature/coolaction', "$action_base/coolaction.php");

	// Register page handler for coolfeature
	elgg_register_plugin_hook_handler('coolfeature', 'labs', 'coolfeature_page_handler');

	// Register example ajax view
	elgg_register_ajax_view('coolfeature/user');
}

// Requirejs init handler
function requirejs_views_boot() {
	// Get require.js working
	elgg_register_simplecache_view('js/requirejs/require_config');
	elgg_register_simplecache_view('js/requirejs/text.js');

	elgg_register_js('elgg.requirejs.require_config', elgg_get_simplecache_url('js', 'requirejs/require_config'), 'head');
	elgg_register_js('elgg.requirejs.require', '/mod/labs/vendors/requirejs/require-2.1.4.min.js', 'head');

	elgg_load_js('elgg.requirejs.require_config');
	elgg_load_js('elgg.requirejs.require');
}

/**
 * Main labs page handler
 *
 * New features should have a simple one word title that be accessed by passing the 
 * name through the labs page handler. i.e.: 
 *
 * {site_url}/labs/coolfeature
 *
 * @param array $page The pages array
 * @return bool
 */
function labs_page_handler($page) {
	// Name of the 'lab', ie: coolfeature
	$lab = $page[0];

	// If we have a lab, trigger its hook handler
	if ($lab) {
		array_shift($page);
		$content = elgg_trigger_plugin_hook($lab, 'labs', $page, null);
	} 

	// If we've got content, show it. Forward off otherwise..
	if ($content) {
		echo $content;
	} else {
		forward();
	}

	return TRUE;
}

/**
 * Coolfeature example page handler
 *
 * @param string $hook    The hook name
 * @param string $type    Hook type
 * @param string $content This handlers content
 * @param array  $page    Page handler style pages array
 */
function coolfeature_page_handler($hook, $type, $content, $page) {
	$page_type = $page[0];

	// Handle xhr requests
	if (elgg_is_xhr()) {
		switch ($page_type) {
			default:
				// spit out some json? sure.
				return json_encode(array(
					'name' => 'cool feature',
					'desc' => 'cool description'
				));
				break;
		}
	} else { // Not xhr, build content
		switch ($page_type) {
			// coolfeature default
			default:
				// Load feature css/js
				elgg_load_js('elgg.coolfeature.coolvendor');
				elgg_load_js('elgg.coolfeature');
				elgg_load_css('elgg.coolfeature');

				// Call lib function to build up content
				$params = coolfeature_get_page_content();
				break;
		}

		$body = elgg_view_layout($params['layout'], $params);
		return elgg_view_page($params['title'], $body);
	}
}