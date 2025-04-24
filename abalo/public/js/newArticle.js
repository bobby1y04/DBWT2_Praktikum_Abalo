"use strict";

let buildForm = function() {
    let formContainer = document.createElement('div');
    formContainer.id = 'form-container';

    let form = document.createElement('form');
    form.id = 'form';
    form.method = 'POST';
    form.action = '/articles';

    buildTextInput(form, 'Artikelname: ', 'name');
    buildTextInput(form, 'Preis: ', 'price', '150px');
    buildTextAreaInput(form, 'Beschreibung:', 'description');
    buildSubmitButton(form);
    formContainer.appendChild(form);
    document.body.appendChild(formContainer);
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

let buildSubmitButton = function(form) {
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
            document.getElementById('form').submit();
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

buildForm();
