<template>
    <div class="module m6" id="task">
        <div class="header activator">
            <h5>Tasks</h5>
            <div class="actions">
                <b class="pointer" title="Create Tasks" v-if="!showCreate" @click="showCreate = true">+</b>
                <b class="pointer" v-else title="Close Create Task" @click="showCreate = false">x</b>
                <i class="ion-android-add-circle"></i>
            </div>
        </div>
        <div class="card-content">
            <create-tasks v-if="showCreate"></create-tasks>
            <list-tasks></list-tasks>
        </div>
    </div>
</template>

<script>
    export default {
        data()
        {
            return{
                showCreate  : false,
            }
        }
    }
</script>
