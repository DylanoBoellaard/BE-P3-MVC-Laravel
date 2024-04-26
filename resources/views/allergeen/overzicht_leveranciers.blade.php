<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>

<body>
    <div class="container">
        <h1>Overzicht leveranciers</h1>

        <table>
            <thead>
                <tr>
                    <th>Naam leverancier</th>
                    <th>Contactpersoon</th>
                    <th>Mobiel</th>
                    <th>Stad</th>
                    <th>Straat</th>
                    <th>Huisnummer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leverancierList as $leverancier) <!-- Foreach Loop to display all product details -->
                <tr>

                    <td>{{$leverancier->naam}}</td>
                    <td>{{$leverancier->contactPersoon}}</td>
                    <td>{{$leverancier->mobiel}}</td>
                    <td>{{$leverancier->stad}}</td>
                    <td>{{$leverancier->straat}}</td>
                    <td>{{$leverancier->huisnummer}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>