/**
 * Spot Labs Vendor example
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */
(function($){
	console.log("cool vendor v0.21.154.12.49-pre-alpha was loaded");
	window.CoolFeature = function(){};
	$.extend(CoolFeature, {
		doCoolThing: function(container, message){
			$(container).append("<span class='coolfeature-message'>" + message + "</span>");
			$(container).each(function() {
				var $_this = $(this);
				setInterval(function() {
					var hue = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
					$_this.animate({ color: hue }, 1000);
				}, 500);
			});
		}
	});
})(jQuery)