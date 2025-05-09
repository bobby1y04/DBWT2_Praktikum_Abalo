"use strict";

let cart = [];

document.addEventListener('DOMContentLoaded', function()  // DOMContentLoaded = wenn HTML geladen ist
{
    const allButtons = document.querySelectorAll('.add-to-cart');

    allButtons.forEach(function(button)
    {
        button.addEventListener('click', function()  // wir verwenden anonyme Funktionen, weil sehr sexy und kürzer als function () {}...
            {
                // console.log("Button clicked");
                const id = parseInt(button.dataset.id);
                const name = button.dataset.name;
                const price = parseFloat(button.dataset.price);

                // console.log(id, name, price);

                addToCart(id, name, price);
            }
        )
    })
})

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
    let sum = 0;
    for (let i = 0; i < cart.length; i++)
    {
        sum += cart[i].price;
    }
    let totalPrice = document.getElementById('total-price');
    totalPrice.textContent = sum.toFixed(2); // Zahl mit 2 Nachkommastellen into String
}
