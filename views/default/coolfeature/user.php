<?php
/**
 * Spot Labs - User View example
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

$user = elgg_get_logged_in_user_entity();

echo elgg_view('user/default', array(
	'entity' => $user,
	'size' => 'large'
));
