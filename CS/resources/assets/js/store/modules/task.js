/**
 * Created by proteux on 11/26/16.
 */
export const task = {
    state: {
        all : []
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
    },
    actions: {  },
    getters: {  }
}