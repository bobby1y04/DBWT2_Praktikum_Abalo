"use strict";

let unternehmen = {
    name: "Unternehmen",
    options: ["Philosophie", "Karriere"]
}

let navMenu = [
  "Home", "Kategorien", "Verkaufen", unternehmen
];


function buildMenu() {
    let navigationContainer = document.createElement("nav");
    navigationContainer.id = "nav-container";
    navigationContainer.style.position = "absolute";
    navigationContainer.style.backgroundColor = "#6f96c3";
    navigationContainer.style.width = "20%";
    navigationContainer.style.height = "180px";
    navigationContainer.style.margin = "0";
    navigationContainer.style.padding = "0";
    navigationContainer.style.top = "0";
    navigationContainer.style.left = "0";
    navigationContainer.style.fontSize = "20px";


    let unorderedList = document.createElement("ul");
    for (const option of navMenu) {
        let listElement = document.createElement("li");
        if (typeof option === "string") {
            listElement.innerHTML = option;
        } else {
            listElement.innerHTML = option['name'];
            listElement.id = option['name'];
            listElement.addEventListener('click', function() {
               showSubCategory(option['name']);
            });
            let ulForCategories = document.createElement("ul");
            ulForCategories.style.listStyleType = "circle";  // Bullet Points
            ulForCategories.style.paddingLeft = "15px";
            for (const elementName of option['options']) {
                let cat = document.createElement("li");
                cat.innerHTML = elementName + '<br>';
                ulForCategories.appendChild(cat);
            }
            ulForCategories.style.display = 'none';
            listElement.appendChild(ulForCategories);
        }
        unorderedList.appendChild(listElement);
    }
    navigationContainer.appendChild(unorderedList);
    document.body.appendChild(navigationContainer);
}

function showSubCategory(catName) {
    let superCategory = document.getElementById(catName);
    let subList = superCategory.querySelector("ul");
    let isVisible = subList.style.display !== 'none';
    subList.style.display = isVisible ? 'none' : 'block';
}


buildMenu();


