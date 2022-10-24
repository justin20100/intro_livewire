<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/">
    <label for="per-page">Choose the pagination count</label>
    <select name="per-page" id="per-page">
        <option value="10" {{$perPage == 10 ? 'selected':''}}>10</option>
        <option value="15" {{$perPage == 15 ? 'selected':''}}>15</option>
        <option value="20" {{$perPage == 20 ? 'selected':''}}>20</option>
    </select>
    @foreach($qp as $n=>$v)
        @if($n != 'per-page' && $n!=='page')
            <input type="hidden" name="{{$n}}" value="{{$v}}">
        @endif
    @endforeach
    <input type="hidden" name="page" id="page" value="1">
    <button type="submit">Change pagination</button>
</form>
<form action="/">
    <label for="search-term">Enter a part of the email or the name</label>
    <input type="search" name="search-term" id="search-term">
    @foreach($qp as $n=>$v)
        @if($n != 'page' && $n!=='search-term')
            <input type="hidden" name="{{$n}}" value="{{$v}}">
        @endif
    @endforeach
    <input type="hidden" name="page" id="page" value="1">
    <button type="submit">Filter contacts list</button>
</form>
<x-table :contacts="$contacts" :qp="$qp" :sortOrder="$sortOrder"/>
</body>
</html>
