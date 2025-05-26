<!-- Component A -->

<script>
export default {
    props: ['counter'],
    methods: {
        increment: function() {
            this.counter++;
        }
    }

}
</script>

<template>
    <div>{{ counter }}</div>
</template>

<style scoped>
div {
    background-color: aqua;
    width: 50px;
    height: 50px;
    text-align: center;
}
</style>
