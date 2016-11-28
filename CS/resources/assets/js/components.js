//register global components here


/**
 * From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('list-tasks', require('./components/ListTasks.vue'));
Vue.component('create-tasks', require('./components/CreateTask.vue'));

/**
 * Register Modules here
 */
Vue.component('task-module', require('./modules/Tasks.vue'));