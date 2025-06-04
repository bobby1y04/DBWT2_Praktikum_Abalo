<script>
export default {
    emits: ['impressum-clicked'],

    methods: {
        handleClick: function() {
            this.$emit('impressum-clicked', 1)
            console.log("Impressum clicked");
        }
    }
}
</script>

<template>
    <footer>
        <h3 @click="handleClick">Impressum</h3>
    </footer>
</template>

<style scoped>
footer {
    height: 100px;
    background-color: #F4F4F4;
    text-align: center;
    bottom: 0;
    margin: 0;
}
</style>
