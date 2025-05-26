<script>
    export default {
        data() {
            return { count : 1 }
        }
}
</script>


<template>
    <button @click="count++">++</button>

    <h1>{{ count }}</h1>

    <button @click="count--">--</button>

</template>


<style scoped>
h1 {
    font-family: "Times New Roman",serif;
}
</style>
