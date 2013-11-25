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

echo elgg_view('input/submit', array(
	'name' => 'submit',
	'id' => 'coolaction-submit',
	'value' => elgg_echo('coolfeature:label:doacoolthing')
));