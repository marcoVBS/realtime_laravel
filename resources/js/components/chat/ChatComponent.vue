<template>
    <div>

        <messages-component></messages-component>
            
        <div class="form-group">
            <textarea @keydown="keydownMessage" placeholder="Sua menagem" class="form-control" v-model="message"></textarea>    
        </div>  
        <button :disabled="loading" type="submit" class="btn btn-success" @click.prevent="sendMessage">
            <pulse-loader :loading="loading" :color="'#fff'" :size="'8px'" class="float-left"></pulse-loader>
            Enviar
        </button>
 
    </div>
</template>

<script>
import PulseLoader from 'vue-spinner/src/PulseLoader'

export default {
    data() {
        return {
            message: '',
            loading: false
        }
    },
    methods: {
        keydownMessage(e){
            if(e.keyCode == 13 && !e.shiftKey){
                e.preventDefault()

                this.sendMessage()
            }
        },
        sendMessage(){
            if(!this.message || this.message.trim() == '' || this.loading)
                return 

            this.loading = true

            this.$store.dispatch('storeMessage', this.message)
                .then(() => {
                    this.message = ''
                })
                .finally(() => {
                    this.loading = false
                })
        },
    },
    components: {
        PulseLoader
    }
}
</script>

<style scoped>
.float-left{float: left;}
</style>