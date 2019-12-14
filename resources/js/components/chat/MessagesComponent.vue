<template>
    <div class="messages" ref="messages">
        <scale-loader :loading="loading"></scale-loader>  

        <message-component 
            v-for="message in messages" 
            :key="message.id"
            :message="message"></message-component>

    </div>
</template>

<script>
import ScaleLoader from 'vue-spinner/src/ScaleLoader'

export default {
    created(){
        this.loadMessages()
    },
    methods: {
        loadMessages(){
            this.loading = true

            this.$store.dispatch('loadMessages')
                .finally(() => {
                    this.loading = false

                    this.scrollMessages()
                })
        },
        scrollMessages(){
            setTimeout(() => {
                this.$refs.messages.scroll({
                    top: this.$refs.messages.scrollHeight,
                    left: 0,
                    behavior: 'smooth'
                })
            }, 100)
        }
    },
    data() {
        return {
            loading: false
        }
    },
    computed: {
        messages(){
            //pegando state
            // return this.$store.state.chat.messages

            //pegando getter
            return this.$store.getters.messages
        }
    },
    watch: {
        messages(){
            this.scrollMessages()
        }
    },
    components: {
        ScaleLoader
    }
}
</script>

<style scoped>
.messages{
    height: 400px;
    max-height: 400px;
    overflow-x: hidden;
    overflow-y: auto;
}
</style>