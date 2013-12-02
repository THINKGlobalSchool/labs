<?php
/**
 * Spot Labs - Lab list source
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */

global $CONFIG;

$sort_by = elgg_extract('sort_by', 'text');

if (isset($CONFIG->menus['labs'])) {
	$menu = $CONFIG->menus['labs'];
} 

// Give plugins a chance to add menu items just before creation.
// This supports dynamic menus (example: user_hover).
$menu = elgg_trigger_plugin_hook('register', "menu:labs", array(), $menu);

$builder = new ElggMenuBuilder($menu);
$vars['menu'] = $builder->getMenu($sort_by);
$vars['selected_item'] = $builder->getSelected();

// Let plugins modify the menu
$menu = elgg_trigger_plugin_hook('prepare', "menu:labs", $vars, $vars['menu']);

$json_menu = array();

foreach ($menu['default'] as $item) {
	$menu_item['name'] = $item->getText();
	$menu_item['href'] = $item->getHref();
	$menu_item['desc'] = $item->desc;
	$menu_item['link_class'] = $item->class;

	$json_menu[] = $menu_item;
}
echo json_encode($json_menu);