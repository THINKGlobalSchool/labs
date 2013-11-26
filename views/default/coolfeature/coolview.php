<?php
/**
 * Spot Labs - Feature View example
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

$content = <<<HTML
	<div>
		This is a pretty cool feature!
	</div>
	<div id='coolfeature-container'>
		<!-- Will contain some cool content -->
	</div>
	<div id='coolfeature-json-output' class='clearfix'>
		<!-- Will contain some more cool content -->
	</div>
HTML;

echo $content;