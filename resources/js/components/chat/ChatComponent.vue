<template>
    <div>

        <messages-component></messages-component>
            
        <textarea @keydown="keydownMessage" placeholder="Sua menagem" v-model="message"></textarea>    
 
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
textarea{
    width: 90%;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 6px;
    max-width: 90%;
    float: left;
}
button{
    margin: 12px 6px;
}
</style>