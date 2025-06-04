<script>
export default {
    data() {
        return {
            seitenzahl: 1
        }
    },
    methods: {
        increment: function() {
            if (this.$data.seitenzahl < 10) {
                this.$data.seitenzahl++;
            }
        },
        decrement: function() {
            if (this.$data.seitenzahl > 0) {
                this.$data.seitenzahl--;
            }
        }
    }
}
</script>

<template>
    <div>
        <span @click="decrement">&lt; &nbsp;</span>
        <span>{{ seitenzahl }}</span>
        <span @click="increment">&nbsp; &gt;</span>
    </div>

</template>

<style scoped>
div {
    background-color: aquamarine;
}
</style>
