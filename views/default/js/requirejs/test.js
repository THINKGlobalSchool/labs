/**
 * Requirejs Test Module
 */
define(function(require) {
	var showAlert = function(message) {
		elgg.system_message(message);
	}

	console.log('Test module loaded!');

	return {
		showAlert: showAlert
	};
});
