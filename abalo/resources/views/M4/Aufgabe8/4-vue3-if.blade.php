<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>if</title>
    @vite('resources/js/app.js')
</head>
<body>
<div id="app3">
    <div>
        <h1 style="color: red;" v-if="serverdown">Der Webserver ist zurzeit nicht erreichbar</h1>
        <h1 style="color: green;" v-else>Der Webserver ist erreichbar</h1>
    </div>
</div>

</body>
</html>
