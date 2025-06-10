<script>
export default {

    props: ['articles', 'seitenzahl', 'offset'],
    emits: ['update-seitenzahl', 'update-offset'],

    data() {
        return {
            max_seitenanzahl : 0,
        }
    },
    methods: {
        increment: function () {
            console.log("Max-Seitenanzahl: " + this.max_seitenanzahl);
            if (this.seitenzahl < (this.max_seitenanzahl)) {
                const neueSeite = this.seitenzahl + 1;
                const neuerOffset = this.offset + 5;
                this.$emit('update-seitenzahl', neueSeite);
                this.$emit('update-offset', neuerOffset);
            }
        },
        decrement: function () {
            if (this.seitenzahl > 1) {
                const neueSeite = this.seitenzahl - 1;
                const neuerOffset = this.offset - 5;
                this.$emit('update-seitenzahl', neueSeite);
                this.$emit('update-offset', neuerOffset);
            }
        },
        get_max_seitenanzahl: function () {
            let xhrAmount = new XMLHttpRequest();
            xhrAmount.open('GET', '/api/articles/amount');

            xhrAmount.onreadystatechange = () => {
                if (xhrAmount.readyState === 4) {
                    if (xhrAmount.status === 200) {
                        console.log("Paginator detected " + xhrAmount.responseText + " articles.");
                        this.$data.max_seitenanzahl = Math.ceil(parseInt(xhrAmount.responseText) / 5);
                    } else {
                        console.error(xhrAmount.statusText);
                    }
                }
            }
            xhrAmount.send();
        }
    },
        mounted() {
            this.get_max_seitenanzahl();
        }
    }
</script>

<template>
    <div>
        <span @click="decrement" class="button">&lt; &nbsp;</span>
        <span>{{ seitenzahl }}</span>
        <span @click="increment" class="button">&nbsp; &gt;</span>
    </div>

</template>

<style scoped>
    .button {
        background-color: lightgray;
    }
</style>
