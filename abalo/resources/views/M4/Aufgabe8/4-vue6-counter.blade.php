<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>counter</title>
    @vite('resources/js/app.js')

    <style>
        div.schaltflaeche {
            width: 100px;
            height: 100px;
            background-color: gray;
        }
    </style>
</head>
<body>

    <div id="app6">
        <div class="schaltflaeche" @click="increment">
            @{{ val }}
        </div>
    </div>

</body>
</html>
