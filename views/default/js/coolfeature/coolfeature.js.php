<?php
/**
 * Spot Labs - Example feature JS lib
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
elgg.provide('elgg.coolfeature');

// Init
elgg.coolfeature.init = function() {
	console.log('init cool feature!');
	CoolFeature.doCoolThing('#coolfeature-container', 'HEY THIS IS PRETTY COOL!');

	$('#coolaction-submit').click(function(event) {
		elgg.action('coolfeature/coolaction', function(data) {
			// Do something with data..
		});
		event.preventDefault();
	});
}

elgg.register_hook_handler('init', 'system', elgg.coolfeature.init);
