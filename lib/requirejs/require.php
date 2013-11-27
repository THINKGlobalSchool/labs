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

function require_get_depenencies() {
	return elgg_get_config('amd_dependancies');
}