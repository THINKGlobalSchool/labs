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
/* General plugin CSS here **/
.labs-topbar-icon {
	background: url('<?php echo elgg_get_site_url(); ?>mod/labs/graphics/lab_icon.png') no-repeat;
	width: 16px;
	height: 16px;
	display: inline-block;
}

.labs-topbar-icon:hover {
	background-position: 0 -16px;
}

#todo-list input.edit {
  display: none; /* Hides input box*/
}
#todo-list .editing label {
  display: none; /* Hides label text when .editing*/
}
#todo-list .editing input.edit {
  display: inline; /* Shows input text box when .editing*/
}

#labs-body {
	/* Firefox v3.6+ */
	background-image:-moz-linear-gradient(50% 0% -180deg,rgb(127,19,25) 0%,rgb(171,51,45) 100%); 
	/* safari v4.0+ and by Chrome v3.0+ */
	background-image:-webkit-gradient(linear,50% 0%,50% 100%,color-stop(0, rgb(127,19,25)),color-stop(1, rgb(171,51,45)));
	/* Chrome v10.0+ and by safari nightly build*/
	background-image:-webkit-linear-gradient(-90deg,rgb(127,19,25) 0%,rgb(171,51,45) 100%);
	/* Opera v11.10+ */
	background-image:-o-linear-gradient(-180deg,rgb(127,19,25) 0%,rgb(171,51,45) 100%);
	/* IE v10+ */
	background-image:-ms-linear-gradient(-180deg,rgb(127,19,25) 0%,rgb(171,51,45) 100%);
	background-image:linear-gradient(-180deg,rgb(127,19,25) 0%,rgb(171,51,45) 100%);
	height: 60px;
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffab332d,endColorstr=#ff7f1319,GradientType=0)";
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffab332d,endColorstr=#ff7f1319,GradientType=0);
}

#labs-app {
	width: 500px;
	margin: 40px auto;
}


#labs-app > #header {
	padding: 10px;
}

#labs-app > #header h1 {
    color: #FFFFFF;
    display: inline-block;
    font-size: 50px;
    font-weight: bold;
    line-height: 50px;
    text-shadow: 0 0 10px #222222;
    text-transform: none;
}

#labs-app > #header p {
	color: #FFFFFF;
	padding-top: 10px;
	border-top: 1px dotted #555;
	margin-top: 10px;
}

#labs-app > #blurb {
	color: #FFFFFF;
	box-shadow: 0 0 14px #222222;
	margin-top: 10px;
	padding: 10px;
}

#labs-app > #main {
	background: none repeat scroll 0 0 #FFFFFF;
	box-shadow: 0 0 14px #222222;
	padding: 10px;
}

#labs-app > #main ul#labs-list li {
	background: none repeat scroll 0 0 #EEEEEE;
	border: 1px solid #CCCCCC;
	padding: 5px;
	box-shadow: 1px 1px 2px #666666;
	margin: 5px 0;
}

#labs-app > #main ul#labs-list li label {
	font-size: 1.2em;	
}

#labs-app > #main ul#labs-list li label a {
}

#labs-app > #main ul#labs-list li p {
	color: #555555;
	font-weight: bold;
}

#labs-app > #footer {
    box-shadow: 0 4px 10px #222222;
    color: #000000;
    padding: 5px 10px;
} 

#labs-app > #footer a {
	color: #FFF;
	cursor: pointer;
	height:18px;
}

#labs-app .gradient {
	/* Firefox v3.6+ */
	background-image:-moz-linear-gradient(50% 0% -180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%); 
	/* safari v4.0+ and by Chrome v3.0+ */
	background-image:-webkit-gradient(linear,50% 0%,50% 167%,color-stop(0, rgb(55,72,79)),color-stop(1, rgb(29,40,45)));
	/* Chrome v10.0+ and by safari nightly build*/
	background-image:-webkit-linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	/* Opera v11.10+ */
	background-image:-o-linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	/* IE v10+ */
	background-image:-ms-linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	background-image:linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff37484f,endColorstr=#ff1d282d,GradientType=0)";
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff37484f,endColorstr=#ff1d282d,GradientType=0);

}
