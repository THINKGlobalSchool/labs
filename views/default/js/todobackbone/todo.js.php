<?php
/**
 * Spot Labs - Todo backbone js
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
elgg.provide('elgg.labs.todobackbone');

elgg.labs.todobackbone.init = function() {
	$('.todo-test-item').live('click', function(event){
		// Load in the todo app via requirejs
		require(['todobackbone/todoapp'], function(todoapp) {
			todoapp.init();
		});
		event.preventDefault();
	});
}

elgg.register_hook_handler('init', 'system', elgg.labs.todobackbone.init);