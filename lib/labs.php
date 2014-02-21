<?php
/**
 * Spot Labs Helper Lib
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * This file should only contain helpers for the labs plugin itself.
 * Individual labs should have their own seperate folder.
 */

/**
 * Super simple usage tracking
 */
function labs_track() {
	// Get plugin
	$plugin = elgg_get_plugin_from_id('labs');

	// Create 'opened' annotation
	create_annotation($plugin->guid, "labs_opened", "1", "integer", elgg_get_logged_in_user_guid(), ACCESS_PRIVATE);
}