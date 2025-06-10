<script>
export default {
    props: {
        articles: {
            type: Array,
            required: true
        },
        seitenzahl: {
            type: Number,
            required: true
        }
    },
    emits: ['update-seitenzahl'],

    computed: {
      max_seitenanzahl() {
          return Math.ceil(this.articles.length / 5);
      }
    },
    methods: {
        increment: function() {
            console.log("Max-Seitenanzahl: " + this.max_seitenanzahl);
            if (this.seitenzahl < (this.max_seitenanzahl)) {
                this.$emit('update-seitenzahl', this.seitenzahl + 1);
            }
        },
        decrement: function() {
            if (this.seitenzahl > 1) {
                this.$emit('update-seitenzahl', this.seitenzahl - 1);
            }
        }
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
