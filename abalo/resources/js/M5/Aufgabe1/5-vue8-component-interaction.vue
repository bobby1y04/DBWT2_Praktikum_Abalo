<script>
export default {
    props: ['title', 'price', 'id'],
    emits: ['clicked-item'],

    methods: {
        handleClick: function() {
            this.$emit('clicked-item', this.id);
        }
    }
}
</script>

<template>
    <div @click="handleClick"> {{title}}</div>

</template>

<style scoped>
div {
    background-color: blue;
}

</style>
