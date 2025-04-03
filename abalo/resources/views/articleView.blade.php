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

    <br><br>
<table border="1">
    <thead>
    <tr>
        <th>Artikel-ID</th>
        <th>Name</th>
        <th>Preis</th>
        <th>Beschreibung</th>
        <th>Verkäufer-ID</th>
        <th>Erstellungsdatum</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>

</body>
</html>
