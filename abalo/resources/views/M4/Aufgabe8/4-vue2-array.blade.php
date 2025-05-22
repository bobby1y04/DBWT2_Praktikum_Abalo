<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>array</title>
    @vite('resources/js/app.js')
</head>
<body>
<div id="app2">
    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="article in articles">
            <td>@{{ article.name }}</td>
            <td>@{{ article.price }}</td>
        </tr>
        </tbody>
    </table>

<br>
    <input type="button" v-on:click="addObject" value="add Radio">
</div>


</body>
</html>
