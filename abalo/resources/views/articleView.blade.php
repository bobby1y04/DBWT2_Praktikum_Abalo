<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel Übersicht</title>
    <link rel="stylesheet" href="{{ asset('/css/cart.css') }}">
    @vite('resources/js/app.js')

</head>
<body>
<h1>Artikel Übersicht</h1>

<div id="cart">
    <h2>Warenkorb</h2>
    <ul id="items"></ul> <!-- hier ul weil wir mit JS li´s einfügen werden -->
    <hr class="rounded">
    <p>Zwischensumme: <span id="subtotal-price">0.00</span> &euro;</p>
    <p>19 % MwSt: <span id="mwst">0.00</span> &euro;</p>
    <hr class="solid short">
    <p>Gesamtsumme: <span id="total-price">0.00</span> &euro;</p>
</div>

<div id="search-table">
<form method="GET" action="/articles">
    <label for="search">Suchwort</label>
    <input type="text" id="search" name="search" @input="checkInputLength" autofocus value=<?php echo $_GET['search'] ?? '' ?>>
    <input type="submit" value="suchen">
</form>


<table border="1">
    <thead>
    <tr>
        <th>Artikel-ID</th>
        <th>Name</th>
        <th>Preis</th>
        <th>Beschreibung</th>
        <th>Verkäufer-ID</th>
        <th>Erstellungsdatum</th>
        <th>Bild</th>
        <th>Aktion</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($data))
        @foreach($data as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->ab_name }}</td>
                <td>{{ $article->ab_price / 100}}&euro;</td>
                <td>{{ $article->ab_description }}</td>
                <td>{{ $article->ab_creator_id }}</td>
                <td>{{ $article->ab_createdate }}</td>
                <td><img src="{{ $article->ab_image }}" alt="Bild" width="150" height="75" ></td>
                <td>
                    <button class="add-to-cart"
                            data-id="{{ $article->id }}"
                            data-name="{{ $article->ab_name }}"
                            data-price="{{ $article->ab_price / 100 }}">
                        +
                    </button> <!-- die values werden in die HTML Attribute (z.b. data-id = article-id) gespeichert -> mit JS einfach auslesen -->
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>

</table>
</div>

@vite("resources/js/app.js")
</body>
</html>
