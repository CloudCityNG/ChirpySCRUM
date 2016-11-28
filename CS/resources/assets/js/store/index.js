/**
 * Created by proteux on 11/26/16.
 */
import Vuex from 'vuex'
import {task} from './modules/task'
import {user} from './modules/user'

export const store = new Vuex.Store({
    modules: {
        task,
        user,
    }
});