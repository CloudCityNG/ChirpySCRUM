<template>
    <div class="task" v-for="task in tasks">
        <div class="task-row">
            <div class="task-check">
                <input type="checkbox" class="filled-in" :id="'task-'+ task.id" />
                <label :for="'task-'+ task.id"></label>
            </div>
            <div class="pointer task-name" @click="openedId = task.id == openedId ? 0 : task.id">
                {{ task.subject }}
            </div>
            <div class="task-action align-right">
                <i class="icon ion-chatbubble"></i>
                <i class="pointer icon ion-android-create"></i>
                <i @click="deleteTask(task.id)" class="pointer icon ion-android-delete"></i>
            </div>
        </div>
        <div v-if="task.id == openedId">
            <div class="row task-detail">
                <div class="col m4">Subject</div>
                <div class="col m8">*{{ task.subject }}</div>
                <div class="col m4">Status</div>
                <div class="col m8">*{{ task.status | capitalize }}</div>
                <div class="col m4">Priority</div>
                <div class="col m8">*{{ task.priority }}</div>
                <div class="col m4">Due Date</div>
                <div class="col m8">*{{ task.due_date }}</div>
                <div class="col m4">Description</div>
                <div class="col m8">*{{ task.description }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import {store} from '../store'
    export default {
        ready()
        {
            store.dispatch('fetchTasks');
        },

        computed :
        {
            tasks()
            {
                return store.state.task.all;
            }
        },

        data()
        {
            return{
                openedId    : null
            }
        },

        methods:
        {
            /**
             * deletes a task
             *
             * @param id
             */
            deleteTask(id)
            {
                if (!id)
                    return ;

                store.dispatch({
                    type : 'deleteTasks',
                    id
                });
            }
        }
    }
</script>

<style scoped>
    .task-detail
    {
        background-color: #eee;
    }

    .task{
        clear: both;
        border-bottom: solid #eee 1px;
    }

    .task .task-check, .task .task-name, .task .task-action{
        display: none;
    }

    .task:hover .task-check, .task:hover .task-name, .task:hover .task-action{
        display: inline-block;
    }

    .task .task-check label {
        top: 7px;
    }

    .task .task-row{
        height: 34px;
    }

    .task .task-name{
        display: inline-block;
        width: 81%;
    }

    .task .task-name label{
        color: #000;
    }
</style>
