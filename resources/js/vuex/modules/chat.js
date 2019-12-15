export default {
    state: {
        messages: [],
        users: []
    },

    mutations: {
        LOAD_MESSAGES(state, messages){
            state.messages = messages
        },

        ADD_MESSAGE(state, message){
            state.messages.push(message)
        },

        LOAD_USERS(state, users){
            state.users = users
        },

        JOINING_USERS(state, user){
            state.users.push(user)
        },

        LEAVING_USER(state, user){
            state.users = state.users.filter(u => {
                return u.id !== user.id
            })            
        }
    }, 

    actions: {
        storeMessage(context, body){
            return new Promise((resolve, reject) => {
                axios.post('/chat/message', {body})
                    .then(response => {
                        context.commit('ADD_MESSAGE', response.data)
                        resolve()
                    })                
            })
            
            
        },

        loadMessages(context){
            return axios.get('/chat/messages')
                .then(response => {
                    context.commit('LOAD_MESSAGES', response.data)
                })
        }
    },

    getters: {
        messages(state){
            return _.orderBy(state.messages, 'id', 'asc')
        }
    }
}