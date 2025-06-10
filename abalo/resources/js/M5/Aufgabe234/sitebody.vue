<script>
    export default {
        data() {
          return {
              home_clicked: false
          }
        },
        methods: {

            jumpToLink: function(id) {
                switch(id) {
                    case "Home": {
                        window.document.location.href='/articles';
                        break;
                    }
                    case "Verkaufen": {
                        window.document.location.href='/newarticle';
                        break;
                    }
                }
            }
        }
    }
</script>

<template>
    <main>
        <div v-if="home_clicked === false">
    <ul>
        <li id="Home" @click="this.$data.home_clicked = true">Home</li>
        <li>Kategorien</li>
        <li id="Verkaufen" @click="jumpToLink('Verkaufen')">Verkaufen</li>
        <li> Unternehmen
            <ul>
                <li>Philosophie</li>
                <li>Karriere</li>
            </ul>
        </li>
    </ul>
        </div>
        <div v-else-if="home_clicked === true">
            <button @click="home_clicked = false">zurück</button>
        </div>
    </main>
</template>

<style scoped>
main {
    height: 600px;
}
li {
    font-size: 20px;
}

</style>
