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

createApp({
   data() {
       return {
           serverdown: false
       };
   }
}).mount('#app3');

createApp({
   data() {
       return {
           inputdata: null
       }
   }
}).mount('#app4');

createApp({
    data() {
        return {
            htmlvar: '<b>Vielen Dank</b>, für Ihren Einkauf bei <i>Abalao</i>'
        }
    }
}).mount('#app5');

createApp({
    data() {
        return {
            val: 0
        }

    },
    methods: {
        increment: function() {
            this.$data.val += 1;
        }
    }

}).mount('#app6');
