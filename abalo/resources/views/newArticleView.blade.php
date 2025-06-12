<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Artikeleingabe</title>
    @vite("resources/js/app.js")
    @vite("resources/css/app.scss")
</head>
<body>

    <div id="form-container">
        <form id="form" method="POST" action="/articles">
            @csrf
            <label for="name">Artikelname:</label>
            <input type="text" name="name" id="name" class="basic-input" maxlength="80" required><br><br>
            <label for="price">Preis:</label>
            <input type="number" min="0.00" step="0.01" name="price" id="price" class="basic-input" maxlength="80" required><br><br>
            <label for="description">Beschreibung:</label><br>
            <textarea name="description" id="description"></textarea><br><br>
            <div id="submit-button-container">
            <input type="button" id="submit-button" class="form__button--green" value="Speichern" @click="addArticle" @mouseover="zoom" @mouseleave="zoomOut">
            </div><br>
        </form>

            <div v-if="success == 1">
                <p style="color: green;">Artikel wurde erfolgreich gespeichert.</p>
            </div>
            <div v-else-if="success == 2">
                <p style="color: red;">Fehler beim Speichern des Artikels.</p>
            </div>
    </div>



</body>
</html>
