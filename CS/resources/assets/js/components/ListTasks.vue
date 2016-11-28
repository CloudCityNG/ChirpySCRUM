<template>
    <div v-for="task in tasks">
        <div class="pointer" @click="openedId = task.id == openedId ? 0 : task.id">{{ task.subject }}</div>
        <div v-if="task.id == openedId">
            <div class="row task-detail">
                <div class="col m12 right-align">
                    <span class="btn">e</span>
                    <span class="btn">d</span>
                    <span class="btn">x</span>
                </div>
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
            this.$http.get('api/v1/tasks')
                    .then(response =>
                    {
                        store.commit('allTasks', response.data.data);
                    });
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
                openedId    : 0,
            }
        },
    }
</script>

<style>
    .task-detail
    {
        background-color: #eee;
    }
</style>
