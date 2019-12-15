<template>
    <div>
        <h3>{{ users.length }} usuários online</h3> 

        <div class="users scroll">
            <div v-for="user in users" :key="user.id" class="user">
                <div v-if="user.image" class="user-img">
                    <img :src="`/storage/users/${user.image}`" alt="">    
                </div>  
                <div v-else class="user-img">
                    <img src="/img/no-image.png" alt="">    
                </div>  
                <strong>{{ user.name }}</strong> 
            </div>    
        </div>   
    </div>
</template>

<script>
export default {
    computed: {
        users(){
            return this.$store.state.chat.users
        }
    }
}
</script>

<style scoped>
.users{
    float: left;
    width: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    height: 400px;
    max-height: 400px;
}
.user{
    float: left;
    width: 100%;
    margin: 5px 0;
}
.user-img{
    float: left;
}
.user-img img{
    max-width: 40px;
    border: 1px solid gray;
    border-radius: 100%;
}
.user strong{
    float: left;
    margin: 9px 4px;
}
</style>