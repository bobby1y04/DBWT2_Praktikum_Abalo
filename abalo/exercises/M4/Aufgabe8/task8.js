import {createApp} from "vue";

const vm = createApp ({
    data() {
        return { msg: 'Hallo Welt!'}
    }
}).mount('#app1');

