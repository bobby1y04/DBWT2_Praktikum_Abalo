
"use strict";

let menu = {
    home: {
        name: "Home",
        options: [],
        url: '/articles'
    },

    kategorien: {
        name: 'Kategorien',
        options: [],
        url: ''
    },

    verkaufen: {
        name: "Verkaufen",
        options: [],
        url: '/newarticle'
    },

    unternehmen: {
        name: "Unternehmen",
        options: ["Philosophie", "Karriere"],
        url: ''
    },

    auswahl: [],

    build: function () {
        this.auswahl.push(this.home, this.kategorien, this.verkaufen, this.unternehmen);

        // Container, der die ganze Navigationsleiste beinhaltet
        let navigationContainer = document.createElement("nav");
        navigationContainer.id = "nav-container";
        navigationContainer.style.position = "absolute";
        navigationContainer.style.width = "20%";
        navigationContainer.style.height = "180px";
        navigationContainer.style.margin = "0";
        navigationContainer.style.padding = "0";
        navigationContainer.style.top = "0";
        navigationContainer.style.left = "0";
        navigationContainer.style.fontSize = "20px";

        // Aufzählung der einzelnen Auswahlmöglichkeiten
        let unorderedList = document.createElement("ul");
        // Erstellung der einzelnen Unterpunkte
        for (const option of this.auswahl) {
            let listElement = document.createElement("li");
                listElement.innerHTML = option.name;
                listElement.id = option.name;
                listElement.addEventListener('click', () => {
                    if (option.url) {   // falls hinter der Option eine URL hinterlegt ist
                        window.location.href = option.url;
                    } else {
                        this.toggleSubcategory(option.name);
                    }
                });

                let ulForCategories = document.createElement("ul");
                ulForCategories.style.listStyleType = "circle";
                ulForCategories.style.paddingLeft = "15px";

                for (const elementName of option.options) {
                    let cat = document.createElement("li");
                    cat.innerHTML = elementName + '<br>';
                    ulForCategories.appendChild(cat);
                }

                ulForCategories.style.display = 'none';
                listElement.appendChild(ulForCategories);
            unorderedList.appendChild(listElement);
        }

        navigationContainer.appendChild(unorderedList);
        document.body.appendChild(navigationContainer);
    },

    toggleSubcategory: function (catName) {
        let superCategory = document.getElementById(catName);
        let subList = superCategory.querySelector("ul");
        // prüfe, den aktuellen Sichtbarkeitsstatus der Unterpunkte
        let isVisible = subList.style.display !== 'none';
        // invertiere die Sichtbarkeit
        subList.style.display = isVisible ? 'none' : 'block';
    }
};

menu.build();


