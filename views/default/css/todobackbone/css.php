<?php
/**
 * Spot Labs CSS
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */
?>

#todo-list input.edit {
	display: none; /* Hides input box*/
	width: 80%;
}

#todo-list .editing label {
	display: none; /* Hides label text when .editing*/
}

#todo-list .editing input.edit {
	display: inline; /* Shows input text box when .editing*/
	border-radius: 0px;
}

#todo-list button.destroy {
 	display: inline; /* Shows input text box when .editing*/
 	float: right; 
	font-size: 12px;
	padding: 0;
}

#todo-app > #header #new-todo {
	border-radius: 0px;
}

#todo-app > #main ul#todo-list li {
	background: none repeat scroll 0 0 #EEEEEE;
	border-left: 1px solid #CCCCCC;
	border-right: 1px solid #CCCCCC;
	border-top: 1px solid #CCCCCC;
	padding: 4px;
}

#todo-app > #main #todo-list-filter {
	margin-left: auto;
	margin-right: auto;
	margin-top: 10px;
	text-align: center;
	width: 200px;
	color: #555;
}

#todo-app > #main #todo-list-filter a {
	color: #555;
}

#todo-app > #main #todo-list-filter a.selected {
	font-weight: bold;
	color: #444;
}

#todo-app > #main ul#todo-list li:last-child {
	border-bottom: 1px solid #CCCCCC;
}
