<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abalo</title>
    @vite('resources/js/app.js')

</head>
<body>
    <div id="app">
        <new-site-header></new-site-header>

        <template v-if="whatToShow === 0">
            <new-site-body></new-site-body>
        </template>
        <template v-else>
            <impressum-main></impressum-main>
        </template>

        <new-site-footer @impressum-clicked="changeView"></new-site-footer>
    </div>

</body>
</html>
