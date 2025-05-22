<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>input</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app4">
        <br>
        <p>@{{ inputdata }}</p>
        <br>
        <input type="text" v-model="inputdata">
    </div>

</body>
</html>
