"use strict";

window.setInterval(() => {
    let xhr = new XMLHttpRequest()
    xhr.open('GET', 'message.json');
    xhr.onload = () => {
        let response = JSON.parse(xhr.responseText)
        document.getElementById('welcome_message').innerHTML = response.message;
    }
    xhr.send();
}, 3000);