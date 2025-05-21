"use strict";

let buildForm = function() {
    let formContainer = document.createElement('div');
    formContainer.id = 'form-container';
    formContainer.style.display = 'flex';
    formContainer.style.justifyContent = 'center';
    formContainer.style.alignItems = 'center';
    formContainer.style.height = '100vh'; // Volle Höhe für vertikale Zentrierung

    let form = document.createElement('form');
    form.id = 'form';
    form.method = 'POST';
    form.action = '/articles';

    buildCSRFToken(form);
    buildTextInput(form, 'Artikelname: ', 'name');
    buildTextInput(form, 'Preis: ', 'price', '150px');
    buildTextAreaInput(form, 'Beschreibung:', 'description');
    buildSubmitButton(form, formContainer);
    formContainer.appendChild(form);
    document.body.appendChild(formContainer);
}

let buildCSRFToken = function(form) {
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');

    let csrfInput = document.createElement('input');
    csrfInput.type  = 'hidden';
    csrfInput.name  = '_token';
    csrfInput.value = token;
    form.appendChild(csrfInput);
}

let buildTextInput = function(form, labelName, inputID, width="300px", height="15px", maxLength=80) {
    let buildLabelForInput = document.createElement('label');
    buildLabelForInput.htmlFor = inputID;
    buildLabelForInput.innerHTML = labelName;
    form.appendChild(buildLabelForInput);
    let buildInputForInput = document.createElement('input');
    buildInputForInput.type = 'text';

    buildInputForInput.id = inputID;
    buildInputForInput.name = inputID;
    buildInputForInput.style.width = width;
    buildInputForInput.style.height = height;
    buildInputForInput.maxLength = maxLength;
    switch (inputID) {
        case 'name': {
            buildInputForInput.required = true;
            break;
        }
        case 'price': {
            buildInputForInput.type = 'number';
            buildInputForInput.min = '0.01';
            buildInputForInput.step = '0.01';
            buildInputForInput.required = true;
            break;
        }
    }
    form.appendChild(buildInputForInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(document.createElement('br'));
}

let buildTextAreaInput = function(form, labelName, inputID, width="700px", height="300px") {
    let buildLabelForTAInput = document.createElement('label');
    buildLabelForTAInput.htmlFor = inputID;
    buildLabelForTAInput.innerHTML = labelName + '<br>';
    form.appendChild(buildLabelForTAInput);
    let buildTextAreaForInput = document.createElement('textarea');
    buildTextAreaForInput.id = inputID;
    buildTextAreaForInput.style.resize = 'none';
    buildTextAreaForInput.style.width = width;
    buildTextAreaForInput.style.height = height;
    buildTextAreaForInput.name = 'description';
    form.appendChild(buildTextAreaForInput);
    form.appendChild(document.createElement('br'));
    form.appendChild(document.createElement('br'));
}

let buildSubmitButton = function(form, formContainer) {
    let buildButton = document.createElement('input');
    buildButton.type = 'button';
    buildButton.id = 'submit-button';
    buildButton.value = 'Speichern';
    buildButton.addEventListener('click', function() {
        const nameVal  = document.getElementById('name').value.trim();
        const priceVal = parseFloat(document.getElementById('price').value);
        const nameNotEmpty = nameVal !== '';
        const priceGreaterThanZero = !isNaN(priceVal) && priceVal > 0;
        if (nameNotEmpty && priceGreaterThanZero) {
            sendData(formContainer);
        } else {
            if (!nameNotEmpty) {
                alert('Artikelname darf nicht leer sein!');
            } else if (!priceGreaterThanZero) {
                alert('Preis muss positiv sein!')
            }
        }
    });
    form.appendChild(buildButton);
}

function sendData(formContainer) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '/articles');

    const name = document.getElementById('name').value;
    const price = document.getElementById('price').value;
    const description = document.getElementById('description').value;

    let formData = new FormData();
    formData.append('name', name);
    formData.append('price', price);
    formData.append('description', description);

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formData.append('_token', token);

    let message = document.createElement('p');
    message.id = 'form-message';

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                message.textContent = 'Artikel wurde erfolgreich gespeichert.';
                message.style.color = 'green';
            } else {
                console.error(xhr.statusText);
                message.textContent = 'Fehler beim Speichern des Artikels. ' + xhr.statusText;
                message.style.color = 'red';
            }

            let existingMessage = document.getElementById('form-message');
            if (existingMessage) {
                formContainer.replaceChild(message, existingMessage);
            } else {
                formContainer.appendChild(message);
            }
        }
    }

    xhr.send(formData);

}


buildForm();
