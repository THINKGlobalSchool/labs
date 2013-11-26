<?php
/**
 * Spot Labs Action Example
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */

// Get inputs
$show_message = get_input('show_message', false);
$action_json = get_input('action_json', false);

if ($show_message) {
	system_message(elgg_echo('coolfeature:success:message'));
} else if ($action_json) {
	echo json_encode(array(
		'name' => 'Will Riker',
		'rank' => 'Commander',
		'instrument' => 'Trombone',
		'photo' => elgg_get_site_url() . 'mod/labs/graphics/riker.jpg'
	));
}

forward();