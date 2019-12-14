require('./bootstrap');
window.Vue = require('vue');

import store from './vuex/store'

Vue.component('chat-component', require('./components/chat/ChatComponent').default);
Vue.component('users-component', require('./components/chat/UsersComponent').default);
Vue.component('messages-component', require('./components/chat/MessagesComponent').default);
Vue.component('message-component', require('./components/chat/MessageComponent').default);

const app = new Vue({
    el: '#app',
    store
});
