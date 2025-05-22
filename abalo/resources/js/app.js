import './bootstrap';
import {createApp} from 'vue';




if (window.location.pathname.startsWith('/articles')) {
    import ('./subfunctions/cart.js');
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



