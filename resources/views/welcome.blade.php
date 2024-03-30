<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    @vite(['resources/scss/magazijn/levering.scss', 'resources/scss/magazijn/global.scss'])
</head>

<body>
    <div class="container">
        <a href="{{route('magazijn.index')}}">Overzicht magazijn Jamin</a>
        <a href="{{route('leverancier.index')}}">Overzicht leveranciers Jamin</a>
    </div>
</body>

</html>