/**
 * Created by iemarjay on 12/4/16.
 */

import taskMixins from './task-mixins'

/**
 * requests and responses mixins
 */

function handleErrors({response, state, type})
{
    let errors      = state.errors;
    errors[type]    = [];

    switch (response.status)
    {
        //handle invalid http verb requests
        case 405:
            errors['msg'] = response.statusText;

            break;

        //handle invalid http verb requests
        case 401:
            errors['msg'] = 'Session expired. Kindly, login again';

            break;
    }

    errors.splice(0, 0);
    return errors;
}

export default {
    task        : taskMixins,
    handleErrors,
}