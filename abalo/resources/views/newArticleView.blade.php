<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Artikeleingabe</title>
    <link rel="stylesheet" href="{{asset('/css/newArticleView.css')}}">
</head>
<body>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<script src="{{ asset('/js/backgroundTransition.js') }}"></script>
<script src="{{asset('/js/newArticle.js')}}"></script>
</body>
</html>
