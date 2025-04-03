<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel Übersicht</title>
</head>
<body>
<h1>Artikel Übersicht</h1>

<form method="GET" action="/searchArticle">
    <label for="search">Suchwort</label>
    <input type="text" id="search" name="search">
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
    </tr>
    </thead>
    <tbody>
    @if(isset($data))
    @foreach($data as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->ab_name }}</td>
            <td>{{ $article->ab_price }}</td>
            <td>{{ $article->ab_description }}</td>
            <td>{{ $article->ab_creator_id }}</td>
            <td>{{ $article->ab_createdate }}</td>
            <td><img src="{{ asset($article->ab_image) }}" alt="Bild" width="150" height="75"></td>
        </tr>
    @endforeach
    @endif
    </tbody>

</table>

</body>
</html>
