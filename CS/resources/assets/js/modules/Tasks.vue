<template>
    <div class="module m6" id="task">
        <div class="header activator">
            <h5>Tasks</h5>
            <div class="actions">
                <i class="pointer icon ion-android-add-circle red-text" title="Create Tasks" v-if="!showCreate" @click="showCreate = true"></i>
                <i class="pointer ion-close-circled red-text icon" v-else title="Close Create Task" @click="showCreate = false"></i>
            </div>
        </div>
        <div class="card-content">
            <create-tasks @closed="cancelCreate" :show="showCreate"></create-tasks>
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
        },

        methods:
        {
            cancelCreate()
            {
                this.showCreate = !this.showCreate;
            }
        }
    }
</script>
