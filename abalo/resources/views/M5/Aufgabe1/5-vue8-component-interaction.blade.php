<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>component-interaction</title>
    @vite('resources/js/app.js')
</head>
<body>
<div id="components">
<div @clicked-B="increment">
<component-a></component-a><br>
</div>
<div>
    <component-b></component-b>
</div>
</div>

</body>
</html>
