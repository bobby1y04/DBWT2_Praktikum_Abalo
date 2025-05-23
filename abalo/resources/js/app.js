import './bootstrap';
import { createApp } from 'vue';




if (window.location.pathname.startsWith('/articles')) {
    import ('./subfunctions/cart.js');

    // +++ MEILENSTEIN 4, AUFGABE 10 +++
    createApp({
        methods: {
            checkInputLength: function() {
                let searchField = document.getElementById('search');
                let searchValue = searchField.value;
                if (searchValue.length > 2) {
                    window.location.href = `articles?limit=5&search=${encodeURIComponent(searchValue)}`;
                }
            }
        }
    }).mount('#search-table');
}

if (window.location.pathname.startsWith('/newarticle')) {
    import ('./subfunctions/newArticle.js');
    import ('./subfunctions/backgroundTransition.js');

    createApp({
        data() {
            let success = 0;
            return {
                success: success
            }
        },
        methods: {
            zoom: function() {
                let button = document.getElementById('submit-button');
                let buttonWidth = button.offsetWidth;
                let buttonHeight = button.offsetHeight;
                button.style.width = buttonWidth * 2 + 'px';
                button.style.height = buttonHeight * 2 + 'px';
            },
            zoomOut: function() {
                let button = document.getElementById('submit-button');
                let buttonWidth = button.offsetWidth;
                let buttonHeight = button.offsetHeight;
                button.style.width = buttonWidth / 2 + 'px';
                button.style.height = buttonHeight / 2 + 'px';
            },
            addArticle: function() {
                const nameVal = document.getElementById('name').value.trim();
                const priceVal = parseFloat(document.getElementById('price').value);
                const descriptionVal = document.getElementById('description').value;
                const nameNotEmpty = nameVal !== '';
                const priceGreaterThanZero = !isNaN(priceVal) && priceVal > 0;
                if (nameNotEmpty && priceGreaterThanZero) {
                    this.sendData(nameVal, priceVal, descriptionVal);
                } else {
                    if (!nameNotEmpty) {
                        alert('Artikelname darf nicht leer sein!');
                    } else if (!priceGreaterThanZero) {
                        alert('Preis muss positiv sein!')
                    }
                }
            },
            sendData: function(name, price, description) {
                let vm = this;
                let xhr = new XMLHttpRequest();
                xhr.open('POST', '/api/articles');

                let formData = new FormData();
                formData.append('name', name);
                formData.append('price', price);
                formData.append('description', description);

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                formData.append('_token', token);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            vm.success = 1;
                        } else {
                            console.error(xhr.statusText);
                            vm.success = 2;
                        }
                    }
                }
                xhr.send(formData);
            }
        }

    }).mount('#form-container');
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






