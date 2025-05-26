<!-- Component B -->

<script>
import ComponentA from '5-vue8-component-interaction-A.vue'
export default {
    props: ['counter'],
    emit: ['clicked-B'],
    methods: {
        incrementA: function() {
            this.emit('clicked-B');
        }
    }
}
</script>

<template>
    <div @click="incrementA">B</div>
</template>

<style scoped>
div {
    background-color: aquamarine;
    width: 50px;
    height: 50px;
    text-align: center;
}
</style>
