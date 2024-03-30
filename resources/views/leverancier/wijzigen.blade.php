<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzigen gegevens</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>
<body>
    <div class="container">
        <h1>Leveranciers details</h1>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Leveranciernummer</th>
                    <th>Mobiel</th>
                    <th>Straatnaam</th>
                    <th>Huisnummer</th>
                    <th>Postcode</th>
                    <th>Stad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$leverancierInfo[0]->naam}}</td>
                    <td>{{$leverancierInfo[0]->contactPersoon}}</td>
                    <td>{{$leverancierInfo[0]->leverancierNummer}}</td>
                    <td>{{$leverancierInfo[0]->mobiel}}</td>
                    <td>{{$leverancierInfo[0]->straat}}</td>
                    <td>{{$leverancierInfo[0]->huisnummer}}</td>
                    <td>{{$leverancierInfo[0]->postcode}}</td>
                    <td>{{$leverancierInfo[0]->stad}}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{route('leverancier.wijzigenGegevens', [$leverancierInfo[0] -> id])}}">Wijzig</a>
        <a href="">Terug</a>
        <a href="{{route('home')}}">Home</a>
    </div>
</body>
</html>