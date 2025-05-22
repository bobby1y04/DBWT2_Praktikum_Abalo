import {createApp} from 'vue';

createApp({
    data() {
        return { msg: 'Hallo Welt!' }
    }
}).mount('#app1');


createApp({
    data() {

        return {
            articles: [
                {name:"Reifen",price:8290},
                {name:"Antenne drehbar. Leicht geknickt",price:1400},
                {name:"Opel Kadett C 1992 - wie neu",price:150000}
            ],
            articleToBeAdded: {
                name:"Radio-UKW",
                price:4500 // 45 €
            }
        };
    },
    methods: {
        addObject: function() {
            this.$data.articles.push(this.$data.articleToBeAdded);
        }
    }

}).mount('#app2');
