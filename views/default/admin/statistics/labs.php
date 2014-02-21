<?php
/**
 * Spot Labs - Admin Stats
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 201
 * @link http://www.thinkglobalschool.com/
 * 
 */

$plugin = elgg_get_plugin_from_id('labs');

if ($plugin) {
	$views_title = elgg_echo('labs:stats:byuser');
	$overview_title = elgg_echo('labs:stats:overview');
	
	$options = array(
		'guid' => $plugin->guid,
		'type' => 'object',
		'annotation_name' => 'labs_opened',
		'limit' => 0,
		'count' => TRUE,
	);
	
	// Total view count
	$total_view_count = elgg_get_annotations($options);

	// Group by owner_guid foir unique viewers
	$options['group_by'] = 'n_table.owner_guid';
	$options['count'] = FALSE;
	
	// Viewer info
	$views = elgg_get_annotations($options);
	
	$unique_view_count = count($views);
	
	$view_content = '';
	
	// Build viewers content
	foreach ($views as $view) {
		$user = get_entity($view->owner_guid);
		$user_link = elgg_view('output/url', array(
			'text' => "<span class='labs-admin-statistics-userlink'>"  . $user->name . "</span>",
			'href' => $user->getURL(),
		));

		$count_options = array(
			'guid' => $plugin->guid,
			'annotation_owner_guids' => $user->guid,
			'type' => 'object',
			'annotation_name' => 'labs_opened',
			'count' => TRUE,
		);

		$user_count = elgg_get_annotations($count_options);
		
		$user_icon = elgg_view_entity_icon($user, 'tiny');
		
		$view_content .= "<tr><td>" . elgg_view_image_block($user_icon, $user_link) . "</td>";
		$view_content .= "<td class='count'>" . $user_count . "</td></tr>";
	}

	
	if (!$view_content) {
		$view_content = elgg_echo('labs:stats:noviews');
	} else {
		$view_content = '<table class="labs-stats-table">' . $view_content . '</table>';
	}
	
	// View info content
	$total_label = elgg_echo('labs:stats:totalviews');
	$unique_label = elgg_echo('labs:stats:uniqueviews');
	
	$overview_content = <<<HTML
		<div>
			<label>$total_label:</label>&nbsp;$total_view_count
		</div>
		<div>
			<label>$unique_label:</label>&nbsp;$unique_view_count
		</div>
HTML;
	
	echo elgg_view_module('inline', $overview_title, $overview_content);
	echo elgg_view_module('inline', $views_title, $view_content);

	echo <<<CSS
		<style type='text/css'>
			.labs-admin-statistics-userlink {
				display: block;
				font-weight: bold;
				margin-top: 5px;
			}

			.labs-stats-table {
				width: 50%;
			}

			.labs-stats-table td {
				width: 50%;
			}

			.labs-stats-table td.count {
				color: #333333;
				font-size: 120%;
				font-weight: bold;
				padding-top: 3px;
			}
		</style>
CSS;
} 