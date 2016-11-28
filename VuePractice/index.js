/**
 * Created by emarjay.cm on 8/19/16.
 */
var Hello   = require('./Hello');

Vue.component(hello, Hello);

vm  = new Vue({
    el      : '#a',
    data    : {
        transitionName  : 'fade',
        message : "11111111111111",
        active  : true,
        activeRowStyle  :
        {
            color       : 'green',
            fontSize    : '20px'
        },

        items: [
            { message: 'Foo' },
            { message: 'Bar' }
        ]
    },

});

vm.$watch('message', function() {
    this.items.push({ message: this.message })
});

