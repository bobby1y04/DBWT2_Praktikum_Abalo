import './bootstrap';
import { sum } from 'mathjs';


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



