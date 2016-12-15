<template>
    <form class="modal row" id="editTask" @submit.prevent="updateTask">
        <div class="col m12 input-field">
            <input id="create-task-subject" class="validate" :class="errors.subject ? 'invalid': '' " type="text" v-model="input.subject">
            <label for="create-task-subject" :class="errors.subject ? 'active': ''" :data-error="errors.subject ? errors.subject[0]: ''">Subject</label>
        </div>

        <div class="col m6 input-field">
            <select id="create-task-status" class="browser-default validate" :class="errors.status ? 'invalid': '' "  v-model="input.status">
                <option :value="status" v-for="status in statusOption">{{ status }}</option>
            </select>
            <label for="create-task-status" class="active" :data-error="errors.status ? errors.status[0]: ''">Status</label>
        </div>

        <div class="col m3 input-field">
            <input type="number" max="5" v-model="input.priority" :class="errors.priority ? 'invalid': '' " id="create-task-priority">
            <label for="create-task-priority" :class="errors.priority ? 'active': ''" :data-error="errors.priority ? errors.priority[0]: ''">Priority</label>
        </div>

        <div class="col m3 input-field">
            <input type="date" class="datepicker" :class="errors.due_date ? 'invalid': '' " v-model="input.due_date" id="create-task-due">
            <label for="create-task-due" :class="errors.due_date ? 'active': ''" :data-error="errors.due_date ? errors.due_date[0]: ''">Due Date</label>
        </div>

        <div class="col m12 input-field">
            <textarea class="materialize-textarea" :class="errors.description ? 'invalid': '' " v-model="input.description" id="create-task-desc"></textarea>
            <label for="create-task-desc" :class="errors.description ? 'active': ''" :data-error="errors.description ? errors.description[0]: ''">Description</label>
        </div>

        <div class="col m12 right-align">
            <button type="submit" class="btn waves-effect waves-light">Update Task</button>
            <button type="reset" class="btn red waves-effect waves-light" @click="cancel">Cancel</button>
        </div>
    </form>
</template>

<script>
    import {store} from '../store'
    export default {
        computed :
        {
            errorMsg()
            {
                return store.state.task.errors['edit']['msg'];
            },

            errors()
            {
                return store.state.task.errors['edit']['errors'];
            }
        },

        data()
        {
            return {
                input   :
                {
                    subject     : null,
                    status      : 'New',
                    priority    : null,
                    due_date    : null,//not camel case cos of laravel create method
                    description : null
                },
                statusOption : ['New', 'On Going', 'Completed', 'Rework'],
            }
        },

        ready()
        {
            $('.modal').modal();
            $('select').material_select();
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 50 // Creates a dropdown of 15 years to control year
            });
        },

        methods :
        {
            setInputPriority(priority)
            {
                this.input.priority = priority;
            },

            updateTask(event)
            {
                store.dispatch({
                    type    : 'updateTask',
                    vm      : $(event.target),
                    input   : this.input,
                });
            },

            cancel()
            {
                this.show = !this.show;
                this.$emit('closed');
            }
        }
    }
</script>
