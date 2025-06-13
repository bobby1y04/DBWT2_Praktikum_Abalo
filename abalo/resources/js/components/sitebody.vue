<script>
import axios from 'axios';
import Paginator from './pagination.vue';
import Toast, {useToast} from 'vue-toastification';
import 'vue-toastification/dist/index.css';
/*
import Echo from 'laravel-echo';

window.Echo = new Echo({
    broadcaster: 'reverb',
    host: 'http://localhost:8085',
});
*/

    export default {
        data() {
            return {
                home_clicked: false,
                articles: [],
                offset: 0,
                seitenzahl: 1,
                hoverHome: false,
                userID: null,
                // subscribedChannels: []
                articleIDs: []
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
                            this.fillArticleIDs();
                            this.connectToWS();
                            // this.setupListeners();  // Channels abonnieren, sobald neue Artikel geladen sind
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
                       this.fillArticleIDs();
                       this.connectToWS();
                       console.log("Amount of articles: " + this.$data.articles.length);
                   }
                };
                xhr.send();
            },
            updateOffset: function(newOffset) {
                this.offset = newOffset;
                this.showArticles();
            },
            setOffer: function(articleID) {
                //console.log("Button clicked");
                axios.post(`/api/articles/${articleID}/offer`)
                    .then(response => {
                      console.log("Artikel wurde erfolgreich beworben", response.data);
                    }).catch(err => {
                        console.error(err);
                    });
            },
            fillArticleIDs() {

                this.articleIDs = [];

                this.articleIDs = this.articles.map(article => article.ID);

                console.log(this.articleIDs);
            },
            connectToWS: function() {
                const conn = new WebSocket('ws://localhost:8085/chat');
                conn.onmessage = e => {
                        let data = JSON.parse(e.data);
                        console.log(data.id);

                        if (this.articleIDs.includes(Number(data.id))) {
                            if (Number(this.userID) !== 5) {
                            console.log("userID = ", this.userID);
                            alert(data.message);
                            /*
                            const toast = useToast();
                            toast(data.message, {
                                timeout: 10000,
                                closeOnClick: true,
                                pauseOnHover: true
                            });
                            */
                        }
                    }
                };

                conn.onopen = () => {
                    console.log("WebSocket verbunden.");
                };

                conn.onerror = (error) => {
                    console.error("WebSocket Fehler:", error);
                };

                conn.onclose = () => {
                    console.log("WebSocket Verbindung geschlossen.");
                };
            },

            /*
            setupListeners: function() {
                this.articles.forEach((article) => {
                    const channelName = `article.${article.ID}`;
                    if (!this.subscribedChannels.includes(channelName)) {
                        console.log("Abonniere Channel: " + channelName);
                        window.Echo.channel(channelName)
                            .listen('AbArticleUpdated', (event) => {
                               let toast = useToast();
                               toast.info("Test");
                            });
                        this.subscribedChannels.push(channelName);
                    }
                })
            }
            */

        },
        mounted() {
            // Query-Parameter userID aus URL auslesen
            const params = new URLSearchParams(window.location.search);
            this.userID = params.get('userID');
            this.getArticles();
            // this.setupListeners();
            // this.connectToWS();
        },
    }

</script>

<template>
    <main class="site-body">
        <div v-if="home_clicked === false" class="menu">
            <ul class="menu__list">
                <li id="Home" class="menu__item--simple" @click="this.$data.home_clicked = true">Home</li>
                <li class="menu__item--simple">Kategorien</li>
                <li id="Verkaufen" class="menu__item--simple" @click="jumpToLink('Verkaufen')">Verkaufen</li>
                <li class="menu__item--simple">Unternehmen
                    <ul class="menu__sublist">
                        <li class="menu__subitem--simple">Philosophie</li>
                        <li class="menu__subitem--simple">Karriere</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div v-else-if="home_clicked === true" class="article-search">
            <button class="article-search__back--red" @click="home_clicked = false">zurück</button>

            <label for="search">Suchwort: </label>
            <input type="text" id="search" class="article-search__input" @input="checkInputLength" autofocus>
            <button class="article-search__button--green" @click="showArticles()">suchen</button>

            <paginator :articles="articles" :seitenzahl="seitenzahl" :offset="offset"
                       @update-seitenzahl="seitenzahl = $event"
                       @update-offset="updateOffset" />

            <table class="article-list">
                <thead>
                <tr class="article-list__header-row--simple">
                    <th>Artikel-ID</th>
                    <th>Name</th>
                    <th>Preis</th>
                    <th>Beschreibung</th>
                    <th>Verkäufer-ID</th>
                    <th>Erstellungsdatum</th>
                    <th>Bild</th>
                    <th>Aktion</th>
                </tr>
                </thead>
                <tbody id="search-results">
                <tr v-for="article of articles" :key="article.ID" class="article-list__item--simple">
                    <td>{{ article.ID }}</td>
                    <td>{{ article.Name }}</td>
                    <td>{{ article.Preis / 100 }} &euro;</td>
                    <td>{{ article.Beschreibung }}</td>
                    <td>{{ article.SellerID }}</td>
                    <td>{{ article.Erstellungsdatum }}</td>
                    <td><img :src="article.Bild" alt="Bild" width="100" height="75"></td>
                    <td><button v-if="article.SellerID == userID" @click="setOffer(article.ID)">Artikel jetzt als Angebot anbieten</button></td>
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
