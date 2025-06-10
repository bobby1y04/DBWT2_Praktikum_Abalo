import './bootstrap';
import { createApp } from 'vue';
import ClickCounter from './M5/Aufgabe1/5-vue7-component.vue';
import Paginator from './M5/Aufgabe1/5-vue9-component-pagination.vue'
import AbArticle from './M5/Aufgabe1/5-vue8-component-interaction.vue'
import NewSiteHeader from './M5/Aufgabe234/siteheader.vue'
import NewSiteBody from './M5/Aufgabe234/sitebody.vue'
import NewSiteFooter from './M5/Aufgabe234/sitefooter.vue'
import ImpressumMain from './M5/Aufgabe234/impressum.vue'




if (window.location.pathname.startsWith('/articles')) {
    import ('./subfunctions/cart.js');

    // +++ MEILENSTEIN 4, AUFGABE 10 +++
    createApp({
        methods: {
            checkInputLength: function() {
                let searchField = document.getElementById('search');
                let searchValue = searchField.value;
                if (searchValue.length > 2) {
                    // window.location.href = `articles?limit=5&search=${encodeURIComponent(searchValue)}`;
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '/api/articles?limit=5&search=' + encodeURIComponent(searchValue));
                    xhr.onreadystatechange = function() {
                        if (xhr.status === 200 && xhr.readyState === 4) {
                            let results = JSON.parse(xhr.responseText);
                            console.log(results);
                            let tbody = document.getElementById('search-results');
                            tbody.innerHTML = "";

                            results.forEach(article => {
                               let row = document.createElement('tr');

                                row.innerHTML = `
                                <td>${article.ID}</td>
                                <td>${article.Name}</td>
                                <td>${(article.Preis / 100).toFixed(2)} €</td>
                                <td>${article.Beschreibung}</td>
                                <td>${article.SellerID}</td>
                                <td>${article.Erstellungsdatum}</td>
                                <td><img src="${article.Bild}" alt="Bild" width="150" height="75"></td>
                                <td><button class="add-to-cart"
                                    data-id="${ article.ID }"
                                    data-name="${ article.Name }"
                                    data-price="${ article.Preis / 100 }">+</button></td>
                                `;
                                tbody.appendChild(row);
                            });
                        }
                    }
                    xhr.send();
                }
            }
        }
    }).mount('#search-table');
}

if (window.location.pathname.startsWith('/newarticle')) {
    // import ('./subfunctions/newArticle.js');
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

// +++ MEILENSTEIN 5, AUFGABE 1 +++
if (window.location.pathname.startsWith('/5-1-1')) {
    createApp({
        components: {
            ClickCounter
        }
    }).mount('#app');
}

if (window.location.pathname.startsWith('/5-1-2')) {

    createApp({
        components: {
            AbArticle
        },
        methods: {
            articleSelected: function(id) {
                console.log('Elternelement erkennt Klick auf Eintrag id=' + id)
            }
        }
    }).mount('#app');
}

if (window.location.pathname.startsWith('/5-1-3')) {
    createApp({
        components: {
            Paginator
        }
    }).mount('#app');
}

// +++ MEILENSTEIN 5, Aufgabe 2
if (window.location.pathname.startsWith('/newsite')) {
    createApp({
        data() {
          return {
              whatToShow: 0
          }
        },
        methods: {
          changeView: function(id) {
            this.$data.whatToShow = id;
          }
        },
        components: {
            NewSiteHeader, NewSiteBody, NewSiteFooter, ImpressumMain
        },
        template:
        `
            <new-site-header></new-site-header>
            <template v-if="whatToShow === 0">
                <new-site-body/>
            </template>
            <template v-else>
                <impressum-main />
            </template>
            <new-site-footer @impressum-clicked="changeView"></new-site-footer>

        `

    }).mount('#app');
}




