<template>
    <div class="message">
        <p><b>{{ message.user.name }}:</b> {{ message.body }}</p>
    </div>
</template>

<script>
export default {
    props: {
        message: {
            require: true,
            type: Object
        }
    }
}
</script>