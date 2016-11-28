<template>
    <form class="row" @submit.prevent="storeTask">
        <div class="col m12 input-field">
            <input id="create-task-subject" type="text" v-model="input.subject">
            <label for="create-task-subject">Subject</label>
        </div>

        <div class="col m6 input-field">
            <input type="text"  v-model="input.status" id="create-task-status">
            <label for="create-task-status">Status</label>
        </div>

        <div class="col m3 input-field">
            <input type="text"  v-model="input.priority" id="create-task-priority">
            <label for="create-task-priority">Priority</label>
        </div>

        <div class="col m3 input-field">
            <input type="text" class="datepicker" v-model="input.dueDate" id="create-task-due">
            <label for="create-task-due">Due Date</label>
        </div>

        <div class="col m12 input-field">
            <textarea class="materialize-textarea" v-model="input.description" id="create-task-desc"></textarea>
            <label for="create-task-desc">Description</label>
        </div>

        <div class="col m12 right-align">
            <button type="submit" class="btn">Add Task</button>
        </div>
    </form>
</template>

<script>
    import {store} from '../store'
    export default {
        data()
        {
            return {
                statusOption : ['New', 'On Going', 'Completed', 'Rework'],
                input   :
                {
                    subject     : '',
                    status      : 'New',
                    priority    : '',
                    due_date    : '',//not camel case cos of laravel create method
                    description : ''
                }
            }
        },

        methods :
        {
            setInputPriority(priority)
            {
                this.input.priority = priority;
            },

            storeTask(event)
            {
                this.$http.post('/api/v1/tasks/store', this.input).then(response =>
                {
                    store.commit('prependTask', response.data.data);
                    $(event.target).trigger('reset');
                })
            }
        }
    }
</script>
