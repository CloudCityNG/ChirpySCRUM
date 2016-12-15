/**
 * Created by proteux on 11/26/16.
 */
import config from '../config/index';
import mixin from '../mixins/mixins'

let errors = [];
errors['create']            = [];
errors['create']['errors']  = '';
errors['create']['msg']     = '';
errors['edit']              = [];
errors['edit']['errors']    = '';
errors['edit']['msg']       = '';

export const task = {
    state: {
        all : [],
        editData: [],
        errors,
    },
    mutations: {
        allTasks(state, tasks)
        {
            if (tasks && tasks.length)
            {
                state.all = tasks
            }
        },

        prependTask(state, task)
        {
            state.all.splice(0, 0, task);
        },

        removeTask(state, taskId)
        {
            state.all.map(function (task, index)
            {
                if (task.id == taskId)
                    state.all.splice(index, 1);
            });
        }
    },
    actions:
    {
        /**
         * fetch tasks from the backend
         *
         * @param context
         */
        fetchTasks(context)
        {
            Vue.http.get(config.url.tasks.index)
                .then(response =>
                {
                    context.commit('allTasks', response.data.data);
                });
        },

        /**
         * store tasks on the backend
         *
         * @param context
         * @param payload
         */
        storeTask(context, payload)
        {
            Vue.http.post(config.url.tasks.store, payload.input)
                .then(
                    response =>
                    {
                        context.commit('prependTask', response.data.data);
                        payload.vm.trigger('reset');
                    },

                    response =>
                    {
                        if (response.status == 422)
                        {
                            let  errors = context.state.errors;

                            //handle validation errors
                            errors['create']['msg']     = errors['msg'] = 'Validation Error, Kindly fill the form correctly.';
                            errors['create']['errors']  = response.data;

                            context.state.errors.splice(0, 0);
                            return;
                        }

                        mixin.handleErrors({
                            response,
                            state   : context.state,
                            type    : 'create',
                        });
                    }
                );
        },

        /**
         * delete tasks on the backend
         *
         * @param context
         * @param payload
         */
        deleteTasks(context, payload)
        {
            Vue.http.post(config.url.tasks.delete+ '/'+ payload.id, {_method: 'delete'})
                .then(
                    //on success
                    response =>
                    {
                        // remove task
                        context.commit('removeTask', response.data.data);
                    },

                    //on error
                    response =>
                    {
                        mixin.handleErrors({
                            response,
                            state   : context.state,
                            type    : 'delete',
                        });
                    });
        }
    },
    getters: {  }
};