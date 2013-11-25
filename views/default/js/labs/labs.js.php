<?php
/**
 * Spot Labs JS
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */
?>
//<script>
elgg.provide('elgg.labs');

// Init
elgg.labs.init = function() {
	// General labs plugin JS init code here
}

elgg.register_hook_handler('init', 'system', elgg.labs.init);
