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
	/** General labs plugin JS init code here **/

	// Labs topbar icon
	$('.labs-topbar-icon').live('click', function(event) {
		require(['underscore', 'backbone'], function (_, Backbone) {  
			// Do something with backbone
			var object = {};

			_.extend(object, Backbone.Events);

			object.on("alert", function(msg) {
				elgg.system_message(msg);
			});

			object.trigger("alert", "Hello Backbone!");

		});
		event.preventDefault();
	});

	// Just a test to see if underscore/backbone are loaded
	// require(['underscore', 'backbone'], function (_, Backbone) {  
	// 	console.log(_);
	// 	console.log(Backbone); 
	// });
}

elgg.register_hook_handler('init', 'system', elgg.labs.init);