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
 */

elgg_register_event_handler('init', 'system', 'labs_init');

// Init labs
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

	/** EXAMPLES (Labs should provide their own JS/CSS libs) **/

	// Example vendor JS init
	$js = elgg_get_simplecache_url('js', 'coolvendor.js');
	elgg_register_simplecache_view('js/coolvendor.js');
	elgg_register_js('elgg.coolvendor', $js);

	// Example feature JS lib init
	$js = elgg_get_simplecache_url('js', 'coolfeature/coolfeature.js');
	elgg_register_simplecache_view('js/coolfeature/coolfeature.js');
	elgg_register_js('elgg.coolfeature', $js);

	// Example feature CSS init
	$css = elgg_get_simplecache_url('css', 'coolfeature/coolfeature.css');
	elgg_register_simplecache_view('css/coolfeature/coolfeature.css');
	elgg_register_css('elgg.coolfeature', $css);

	// Example Feature Action
	$action_base = elgg_get_plugins_path() . "labs/actions/coolfeature";
	elgg_register_action('coolfeature/coolaction', "$action_base/coolaction.php");

	/** END EXAMPLES **/
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

	// Handle xhr requests different, if needed
	if (elgg_is_xhr()) {
		switch ($lab) {
		case 'coolfeature':
			// spit out some json? sure.
			echo json_encode(array(
				'name' => 'cool thing',
				'desc' => 'all about my cool thing'
			));
			break;
		}
	} else { // Not xhr, build content

		// Load up main plugin JS
		elgg_load_js('elgg.labs');

		// Handler each 'lab'
		switch ($lab) {
			// coolfeature!
			case 'coolfeature':
				// Load feature css/js
				elgg_load_js('elgg.coolvendor');
				elgg_load_js('elgg.coolfeature');
				elgg_load_css('elgg.coolfeature');

				// Call lib function to build up content
				$params = coolfeature_get_page_content();
				break;
			default:
				forward();
		}

		$body = elgg_view_layout($params['layout'], $params);
		echo elgg_view_page($params['title'], $body);
	}

	return TRUE;
}