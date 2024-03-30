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
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Leveranciernummer</th>
                    <th>Mobiel</th>
                    <th>Aantal verschillende producten</th>
                    <th>Toon producten</th>
                    <th>Wijzigen gegevens</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leverancierList as $leverancier) <!-- Foreach Loop to display all product details -->
                <tr>
                    <td>{{$leverancier->naam}}</td>
                    <td>{{$leverancier->contactPersoon}}</td>
                    <td>{{$leverancier->leverancierNummer}}</td>
                    <td>{{$leverancier->mobiel}}</td>
                    <td>{{$leverancier->aantal_verschillende_producten}}</td>
                    <td>
                        <a href="{{route('leverancier.geleverdeProducten', [$leverancier -> id])}}">
                            <img class="small-img" src="/img/Box.png" alt="Box.png">
                        </a>
                    </td>
                    <td>
                        <a href="{{route('leverancier.wijzigen', [$leverancier -> id])}}">
                            <img class="small-img" src="/img/Edit-icon.png" alt="Edit-icon.png">
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>