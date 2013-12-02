/**
 * Todo test app module
 */
define(['underscore', 'backbone', 'backbone-localstorage', '_backbone/templateloader'], function (_, Backbone, storage, loader) { 
	// Init function
	var init = function() {
		// Clear/reset app and backbone history
		$('#lab-app-container').html('');
		if (Backbone) {
			Backbone.history.stop();
		}

		// Set template base for this app
		var template_base = elgg.get_site_url() + 'ajax/view/todobackbone/templates/'; 
		
		// Load in templates
		var app_template = loader.load(template_base, 'todo-app');
		var todo_item = loader.load(template_base, 'todo-item');

		$('#lab-app-container').append(app_template);

		var todoApp = {};
		todoApp.Router = Backbone.Router.extend({
			routes: {
				'*filter' : 'setFilter'
			},
			setFilter: function(params) {
				if (params) {
					// console.log('todoApp.router.params = ' + params);
					window.filter = params.trim();
				} else {
					window.filter = '';
				}
				todoApp.todoList.trigger('reset');
			}
		});

		todoApp.Todo = Backbone.Model.extend({
			defaults: {
				title: '',
				completed: false
			},
			toggle: function(){
				this.save({ completed: !this.get('completed')});
			}
		});

		todoApp.TodoList = Backbone.Collection.extend({
			model: todoApp.Todo,
			localStorage: new Store("backbone-todo"),
			completed: function() {
				return this.filter(function(todo) {
					return todo.get('completed');
				});
			},
			remaining: function() {
				return this.without.apply(this, this.completed());
			}
		});

		todoApp.todoList = new todoApp.TodoList();

		// Render todo items
		todoApp.TodoView = Backbone.View.extend({
			tagName: 'li',
			template: _.template($(todo_item).html()),
			render: function(){
				this.$el.html(this.template(this.model.toJSON()));
				this.input = this.$('.edit');
				return this; // enable chained calls
			},
			initialize: function(){
				this.model.on('change', this.render, this);
				this.model.on('destroy', this.remove, this); // remove: Convenience Backbone'
			},
			events: {
				'dblclick label' : 'edit',
				'keypress .edit' : 'updateOnEnter',
				'blur .edit' : 'close',
				'click .toggle': 'toggleCompleted',
				'click .destroy': 'destroy'
			},
			edit: function(){
				this.$el.addClass('editing');
				this.input.focus();
			},
			close: function(){
				var value = this.input.val().trim();
				if(value) {
				  this.model.save({title: value});
				}
				this.$el.removeClass('editing');
			},
			updateOnEnter: function(e){
				if(e.which == 13){
					this.close();
				}
			},
			toggleCompleted: function(){
				this.model.toggle();
			},
			destroy: function(){
				this.model.destroy();
			}
		});

		// renders the full list of todo items calling TodoView for each one.
		todoApp.AppView = Backbone.View.extend({
			el: '#todo-app',
			initialize: function () {
				this.input = this.$('#new-todo');
				
				// when new elements are added to the collection render then with addOne
				todoApp.todoList.on('add', this.addOne, this);
				todoApp.todoList.on('reset', this.addAll, this);
				todoApp.todoList.fetch(); // Loads list from local storage
				this.$('.todo-filter-all').addClass('selected');
			},
			events: {
				'keypress #new-todo': 'createTodoOnEnter'
			},
			createTodoOnEnter: function(e){
				if ( e.which !== 13 || !this.input.val().trim() ) { // ENTER_KEY = 13
				return;
			}
				todoApp.todoList.create(this.newAttributes());
				this.input.val(''); // clean input box
			},
			addOne: function(todo){
				var view = new todoApp.TodoView({model: todo});
				$('#todo-list').append(view.render().el);
			},
			addAll: function(){
				this.$('#todo-list').html(''); // clean the todo list
				this.$('#todo-list-filter a').removeClass('selected');
				// filter todo item list
				switch (window.filter) {
					case 'pending':
					this.$('.todo-filter-pending').addClass('selected');
					_.each(todoApp.todoList.remaining(), this.addOne);
					break;
				case 'completed':
					this.$('.todo-filter-completed').addClass('selected');
					_.each(todoApp.todoList.completed(), this.addOne);
					break;
				default:
					this.$('.todo-filter-all').addClass('selected');
					todoApp.todoList.each(this.addOne, this);
					break;
				}
			},
			newAttributes: function(){
				return {
					title: this.input.val().trim(),
					completed: false
				}
			}
		});

		// Initializers 
		todoApp.router = new todoApp.Router();
		Backbone.history.start();
		todoApp.appView = new todoApp.AppView();
	}	

	return {
		init: init
	};
});