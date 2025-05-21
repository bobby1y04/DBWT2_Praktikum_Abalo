"use strict";
import { sum, multiply } from 'mathjs';

let cart = [];

initCart();

function initCart() {
    const shoppingcartid = 1;

    fetch(`/api/shoppingcart/${shoppingcartid}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                cart.push({
                    id: item.id,
                    name: item.name,
                    price: item.price / 100
                });
            });
            updateCart();
            updatePrice();
        });

    const allButtons = document.querySelectorAll('.add-to-cart');

    allButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const id = parseInt(button.dataset.id);
            const name = button.dataset.name;
            const price = parseFloat(button.dataset.price);
            addToCart(id, name, price);
        });
    });
}

function addToCart (id, name, price)
{

    for (let i = 0; i < cart.length; i++) // return, falls item schon im warenkorb
    {
        if (cart[i].id === id)
        {
            return;
        }
    }

    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/shoppingcart');
    xhr.setRequestHeader('Accept', 'application/json');

    let form = new FormData();
    form.append('articleID', id);
    xhr.send(form);


    cart.push({id, name, price});

    updateCart();
    updatePrice();
}

function updateCart ()
{
    const ul = document.getElementById('items');
    ul.innerHTML = ""; // alles löschen, da sonst doppelte einträge entstehen

    for (let i = 0; i < cart.length; i++)
    {
        // um items wieder zu entfernen (- Button einbauen)

        let removeButton = document.createElement('button');
        removeButton.textContent = "-";
        removeButton.dataset.id = cart[i].id;
        removeButton.addEventListener('click', function(event)
        {


            const articleId = event.target.dataset.id;
            let shoppingcartid = 1;

            let xhr = new XMLHttpRequest();
            xhr.open('DELETE', `/api/shoppingcart/${shoppingcartid}/articles/${articleId}`);
            xhr.send();


            cart.splice(i, 1); // aus dem array an der pos i genau ein item entfernen
            updateCart();
            updatePrice();
        })

        let li = document.createElement('li');
        li.textContent = "Artikel-ID: " + cart[i].id + ", " + cart[i].name + ", Preis: " + cart[i].price + "€\t";
        li.appendChild(removeButton);
        ul.appendChild(li);
    }

}
function updatePrice ()
{
    let summe = sum(cart.map(item => item.price));

    let totalPrice = document.getElementById('total-price');
    totalPrice.textContent = summe.toFixed(2); // Zahl mit 2 Nachkommastellen into String

    let mwst = document.getElementById('mwst');
    mwst.textContent = multiply(summe, 0.19).toFixed(2);
}
