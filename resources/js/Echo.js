import store from './vuex/store'

Echo.join('chat')
    .here(users => {
        store.commit('LOAD_USERS', users)
    })
    .joining(user => {
        store.commit('JOINING_USERS', user)
    })
    .leaving(user => {
        store.commit('LEAVING_USER', user)
    })
    .listen('.message.sent', (e) => {                       
        store.commit('ADD_MESSAGE', e.message)
    })