<?php
/**
 * Spot Labs JS
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
elgg.provide('elgg.labs');

elgg.labs.body;

// Init
elgg.labs.init = function() {
	/** General labs plugin JS init code here **/

	// click handler to repopulate original body
	$('#show-body').live('click', function(event) {
		$('body').replaceWith(elgg.labs.body);
		$('body').fadeIn();
		elgg.labs.body = $('body');
		event.preventDefault();
	});

	// Labs topbar icon click handler
	$('.labs-topbar-icon').live('click', elgg.labs.initLabsDashboard);

	// //Just a test to see if underscore/backbone are loaded
	// require(['underscore', 'backbone'], function (_, Backbone) {  
	// 	console.log(_);
	// 	console.log(Backbone); 
	// });
}

elgg.labs.initLabsDashboard = function(event) {
	event.preventDefault();

	$('body').toggle('fade', 200, function() {
		elgg.labs.body = $(this).detach();
		$('html').append($(document.createElement('body')).attr('id', 'labs-body'));

		// BACKBONE
		require(['underscore', 'backbone', 'backbone-localstorage', '_backbone/templateloader'], function (_, Backbone, storage, loader) {
			// Template base dir
			var template_base = elgg.get_site_url() + 'ajax/view/labs/templates/'; 

			// Load in templates
			var app_template = loader.load(template_base, 'labs-app');
			var lab_item = loader.load(template_base, 'lab-item');

			// Create main body
			$('body').append(app_template);

			// Define app
			var app = {};

			// Define lab model
			app.Lab = Backbone.Model.extend({
				defaults: {
					name: '',
					href: false,
					desc: '',
				}
			});

			// Render todo items
			app.LabView = Backbone.View.extend({
				tagName: 'li',
				template: _.template($(lab_item).html()),
				render: function(){
					this.$el.html(this.template(this.model.toJSON()));
					// this.input = this.$('.edit');
					return this; // enable chained calls
				},
				initialize: function(){
					this.model.on('change', this.render, this);
					this.model.on('destroy', this.remove, this); // remove: Convenience Backbone'
				},
				events: {}
			});
	
			// Set up lab list collection
			app.LabList = Backbone.Collection.extend({
				model: app.Lab,
				url: elgg.get_site_url() + 'ajax/view/labs/lab_list',
				parse: function(response) {
					return response;
				},
				sync: function(method, model, options) {
					var that = this;
					var params = _.extend({
						type: 'GET',
						dataType: 'json',
						url: that.url,
						processData: false
					}, options);
					return $.ajax(params);
				}
			});

			app.LabListView = Backbone.View.extend({
				el: $('#labs-list'),
				events: {
				// 'click button#add': 'getPost'
				},
				initialize: function() {
					this.collection = new app.LabList();
					var that = this;
					this.collection.fetch({
						success: function() {
							//console.log(that.collection.toJSON());
						},
						error: function() {
							//console.log('Failed to fetch!');
						}
					});
					this.collection.on('add', this.addOne, this);
					this.collection.on('reset', this.addAll, this);
				},
				addOne: function(lab){
					var view = new app.LabView({model: lab});
					$(this.el).append(view.render().el);
				},
				addAll: function(){
					$(this.el).html(''); 
					this.collection.each(this.addOne, this);
				},
			});

			// Setup initial lab list view
			var labListView = new app.LabListView();

			/** End require block **/
		});
	});
}

elgg.register_hook_handler('init', 'system', elgg.labs.init);