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
 */

// Example content handler
function coolfeature_get_page_content() {
	$params['title'] = 'Cool feature!';
	$params['content'] = elgg_view('coolfeature/coolview');
	$params['content'] .= elgg_view_form('coolfeature/coolaction');
	$params['filter'] = false;
	$params['layout'] = 'content';
	return $params;
}