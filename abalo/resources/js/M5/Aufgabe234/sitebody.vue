<script>
    export default {
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
    <ul>
        <li id="Home" @click="jumpToLink('Home')">Home</li>
        <li>Kategorien</li>
        <li id="Verkaufen" @click="jumpToLink('Verkaufen')">Verkaufen</li>
        <li> Unternehmen
            <ul>
                <li>Philosophie</li>
                <li>Karriere</li>
            </ul>
        </li>
    </ul>
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
