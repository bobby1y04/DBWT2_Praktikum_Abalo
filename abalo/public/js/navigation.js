"use strict";

let navMenu = [
  "Home", "Kategorien", "Verkaufen", {name: "Unternehmen", options: ["Philosophie", "Karriere"]}
];


function buildMenu() {
    let navigationContainer = document.createElement("nav");
    navigationContainer.id = "nav-container";
    navigationContainer.style.backgroundColor = "#6f96c3";
    navigationContainer.style.width = "20%";
    navigationContainer.style.height = "60px";
    navigationContainer.style.margin = "0";
    navigationContainer.style.padding = "0";
    navigationContainer.style.top = "0";
    navigationContainer.style.left = "0";


    let unorderedList = document.createElement("ul");
    for (const option of navMenu) {
        if (typeof option === "string") {
            let listElement = document.createElement("li");
            listElement.innerHTML = option;
            unorderedList.appendChild(listElement);
        } else {
            let listElement = document.createElement("li");
            listElement.innerHTML = option['name'];
            for (const elementName of option['options']) {
                let ulForCategories = document.createElement("ul");
                let cat = document.createElement("li");
                cat.innerHTML = elementName;
                ulForCategories.appendChild(cat);
                listElement.appendChild(ulForCategories);
            }
        }
    }
    navigationContainer.appendChild(unorderedList);
    document.body.appendChild(navigationContainer);


}

buildMenu();
