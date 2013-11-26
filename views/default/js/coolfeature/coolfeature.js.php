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

elgg.coolfeature.ajaxProfileURL = elgg.get_site_url() + 'ajax/view/coolfeature/user';

// Init
elgg.coolfeature.init = function() {
	console.log('init cool feature!');
	CoolFeature.doCoolThing('#coolfeature-container', 'HEY THIS IS PRETTY COOL!');

	// Show a message via action
	$('#coolaction-show-message').click(function(event) {
		elgg.action('coolfeature/coolaction', {
			data: {
				show_message: true,
			},
			success: function(data) {
				if (data.status != -1) {
					// Do something with data..
				} else {
					// Handle error here
				}
			}
		});

		event.preventDefault();
	});

	// Get json and output via action
	$('#coolaction-action-json').click(function(event) {
		elgg.action('coolfeature/coolaction', {
			data: {
				action_json: true,
			},
			success: function(data) {
				if (data.status != -1) {
					elgg.coolfeature.showProfile(data.output);
				} else {
					// Handle error here
				}
			}
		});

		event.preventDefault();
	});

	// Get regular ajax view
	$('#coolaction-view-default').click(function(event) {
		// Use elgg.get to grab the view and dump it into the container
		elgg.get(elgg.coolfeature.ajaxProfileURL, {
			data: {},
			success: function(data) {
				var $container = $('#coolfeature-json-output');
				$container.html('');
				$container.addClass('coolfeature-json-populated');
				$container.html(data);
			}
		});

		event.preventDefault();
	});

	// Get json and output via view
	$('#coolaction-view-json').click(function(event) {
		// Use elgg.getJSON (forces type to JSON)
		elgg.getJSON(elgg.coolfeature.ajaxProfileURL, {
			data: {
				view: 'json'
			},
			success: function(data) {
				elgg.coolfeature.showProfile(data);
			}
		});

		event.preventDefault();
	});
}

// Show a user profile
elgg.coolfeature.showProfile = function(info) {
	var $container = $('#coolfeature-json-output');
	$container.html('');
	$container.addClass('coolfeature-json-populated');

	$.each(info, function(idx, item) {
		if (idx == 'photo') {
			var $photo = $(document.createElement('img'));
			$photo.attr('src', item);
			$photo.attr('id', 'coolfeature-user-photo');
			$container.append($photo);
		} else {
			var $label = $(document.createElement('label'));
			$label.html(idx);

			var $info = $(document.createElement('span'));
			$info.html(item);

			var $field = $(document.createElement('div'));
			$field.addClass('coolfeature-user-field');
			$field.append($label);
			$field.append($info);

			$container.append($field);
		}
	});

	$container.find('.coolfeature-user-field').wrapAll('<div id="coolfeature-user-fields">');
}

elgg.register_hook_handler('init', 'system', elgg.coolfeature.init);
