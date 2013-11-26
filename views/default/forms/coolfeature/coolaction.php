<?php
/**
 * Spot Labs - Example feature form
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */

$message_input = elgg_view('input/submit', array(
	'name' => 'submit_message',
	'id' => 'coolaction-show-message',
	'value' => elgg_echo('coolfeature:label:showmessage')
));

$action_json_input = elgg_view('input/submit', array(
	'name' => 'submit_json_action',
	'id' => 'coolaction-action-json',
	'value' => elgg_echo('coolfeature:label:actionjson')
));

$view_default_input = elgg_view('input/submit', array(
	'name' => 'submit_default_view',
	'id' => 'coolaction-view-default',
	'value' => elgg_echo('coolfeature:label:viewdefault')
));

$view_json_input = elgg_view('input/submit', array(
	'name' => 'submit_json_view',
	'id' => 'coolaction-view-json',
	'value' => elgg_echo('coolfeature:label:viewjson')
));

$content = <<<HTML
	$message_input $action_json_input $view_default_input $view_json_input
HTML;

echo $content;