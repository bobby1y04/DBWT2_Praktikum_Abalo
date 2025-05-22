<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>array</title>
    @vite(['resources/js/app.js'])
</head>
<body>
@verbatim
    <table id="app2" border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="article in articles">
            <td>{{ article.name }}</td>
            <td>{{ article.price }}</td>
        </tr>
        </tbody>
    </table>
@endverbatim

</body>
</html>
