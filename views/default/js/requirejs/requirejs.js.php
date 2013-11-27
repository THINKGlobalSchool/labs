<?php
/**
 * Spot Labs - Require JS Test Lib
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
elgg.provide('elgg.requirejs');

// Init
elgg.requirejs.init = function() {
	require(['requirejs/test'], function(test) {
		// Test out the modules showAlert function
		test.showAlert('Greetings from require test module!');
	});
}

elgg.register_hook_handler('init', 'system', elgg.requirejs.init);
