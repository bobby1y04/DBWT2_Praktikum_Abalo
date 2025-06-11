<script>
    import Paginator from './pagination.vue';
    export default {
        data() {
            return {
                home_clicked: false,
                articles: [],
                offset: 0,
                seitenzahl: 1
            }
        },
        components: {
          Paginator
        },
        methods: {
            jumpToLink: function (id) {
                switch (id) {
                    case "Home": {
                        window.document.location.href = '/articles';
                        break;
                    }
                    case "Verkaufen": {
                        window.document.location.href = '/newarticle';
                        break;
                    }
                }
            },
            getArticles: function () {
                console.log("Offset: " + this.offset);
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/articles?limit=5&offset=' + this.offset);

                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            this.articles = JSON.parse(xhr.responseText);
                        } else {
                            console.error(xhr.statusText);
                        }
                    }
                };

                xhr.send();
            },
            checkInputLength: function () {
                let searchField = document.getElementById('search');
                let searchValue = searchField.value;

                if (searchValue.length > 2) {
                    this.offset = 0;
                    this.seitenzahl = 1;

                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '/api/articles?offset=0&limit=5&search=' + encodeURIComponent(searchValue));
                    xhr.onreadystatechange = () => {
                        if (xhr.status === 200 && xhr.readyState === 4) {
                            this.articles = JSON.parse(xhr.responseText);
                        }
                    };
                    xhr.send();

                    let xhrCount = new XMLHttpRequest();
                    xhrCount.open('GET', '/api/articles/amount?search=' + encodeURIComponent(searchValue));
                    xhrCount.onreadystatechange = () => {
                        if (xhrCount.status === 200 && xhrCount.readyState === 4) {
                            const count = parseInt(xhrCount.responseText);
                            this.$refs.paginator.max_seitenanzahl = Math.ceil(count / 5);
                        }
                    };
                    xhrCount.send();

                }
            },
            showArticles: function() {
                console.log("Offset: " + this.offset);
                let searchField = document.getElementById('search');
                let searchValue = searchField.value;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/articles?limit=5&offset=' + this.offset + '&search=' + encodeURIComponent(searchValue));
                xhr.onreadystatechange = () => {
                   if (xhr.status === 200 && xhr.readyState === 4) {
                       console.log(xhr.responseText);
                       this.$data.articles = JSON.parse(xhr.responseText);
                       console.log(this.$data.articles);
                       console.log("Amount of articles: " + this.$data.articles.length);
                   }
                };
                xhr.send();
            },
            updateOffset(newOffset) {
                this.offset = newOffset;
                this.showArticles();
            }
        },
        mounted() {
            this.getArticles();
        },
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

            <span>&nbsp;</span>
            <label for="search">Suchwort: </label>
            <input type="text" id="search" @input="checkInputLength" autofocus>
            <span>&nbsp;</span>
            <button @click="showArticles()">suchen</button>
            <br><br>
            <paginator :articles="articles" :seitenzahl="seitenzahl" :offset="offset" @update-seitenzahl="seitenzahl = $event" @update-offset="updateOffset" />

            <table border="1">
                <thead>
                <tr>
                    <th>Artikel-ID</th>
                    <th>Name</th>
                    <th>Preis</th>
                    <th>Beschreibung</th>
                    <th>Verkäufer-ID</th>
                    <th>Erstellungsdatum</th>
                    <th>Bild</th>
                </tr>
                </thead>
                <tbody id="search-results">
                    <tr v-for="article of articles" :key="article.ID">
                        <td>{{ article.ID }}</td>
                        <td>{{ article.Name }}</td>
                        <td>{{ article.Preis / 100 }} &euro;</td>
                        <td>{{ article.Beschreibung }}</td>
                        <td>{{ article.SellerID }}</td>
                        <td>{{ article.Erstellungsdatum }}</td>
                        <td><img :src="article.Bild" alt="Bild" width="100" height="75"></td>
                    </tr>
                </tbody>
            </table>

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
