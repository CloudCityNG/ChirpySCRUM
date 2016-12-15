//register global components here


/**
 * From here, you may begin adding components to
 * the application.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('edit-tasks', require('./components/EditTask.vue'));
Vue.component('list-tasks', require('./components/ListTasks.vue'));
Vue.component('create-tasks', require('./components/CreateTask.vue'));

/**
 * Register Modules here
 */
Vue.component('task-module', require('./modules/Tasks.vue'));