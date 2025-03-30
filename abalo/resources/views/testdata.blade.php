<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testdata</title>
</head>
<body>

<h1>Testdata</h1>

@foreach($data as $key => $value)
    <p> <?php echo $key . ': ' . $value?> </p>
@endforeach


</body>
</html>
