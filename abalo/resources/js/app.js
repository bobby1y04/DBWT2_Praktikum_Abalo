import './bootstrap';
import { createApp } from 'vue';




if (window.location.pathname.startsWith('/articles')) {
    import ('./subfunctions/cart.js');

    // +++ MEILENSTEIN 4, AUFGABE 10 +++
    createApp({
        methods: {
            checkInputLength: function() {
                let searchField = document.getElementById('search');
                let searchFieldLength = searchField.value.length;
                if (searchFieldLength > 2) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '/articles');
                    let form = new FormData();
                    form.append('search', searchField.value);
                    xhr.send(form);
                }
            }
        }
    }).mount('#search-form');
}

if (window.location.pathname.startsWith('/newarticle')) {
    import ('./subfunctions/newArticle.js');
    import ('./subfunctions/backgroundTransition.js');
}

if (window.location.pathname.startsWith('/welcome')) {
    import ('./subfunctions/cookiecheck.js');
    import ('./subfunctions/periodic.js');
    import ('./subfunctions/backgroundTransition.js');
    import ('./subfunctions/navigation.js');
}

// +++ MEILENSTEIN 4, AUFGABE 8 +++
if (window.location.pathname.startsWith('/4-8-')) {
    import ('./M4/task8.js');
}






