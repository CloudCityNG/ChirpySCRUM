/**
 * Created by iemarjay on 12/3/16.
 */

let baseUrl     = '/api/v1';
let taskBaseUrl = baseUrl+ '/tasks';

let tasks   = {
    store   : taskBaseUrl+ '/store',
    index   : taskBaseUrl,
    delete  : taskBaseUrl+ '/delete',
};

export default {
    baseUrl,
    tasks
}