<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leveringsinformatie</title>
</head>

<body>
    <h1>Leveringsinformatie</h1>

    <div class="container">
        <!-- Display Leverancier info -->
        <div id="leverancierList">
            @foreach($leverancierList as $leverancier)
            <p><span>Naam leverancier:</span> {{$leverancier->naam}}</p>
            <p><span>contactpersoon leverancier:</span> {{$leverancier->contactPersoon}}</p>
            <p><span>Leverancier nummer:</span> {{$leverancier->leverancierNummer}}</p>
            <p><span>Mobiel:</span> {{$leverancier->mobiel}}</p>
            @endforeach
        </div>

        <table>
            <thead>
                <tr>
                    <th>Naam product</th>
                    <th>Datum laatste levering</th>
                    <th>Aantal</th>
                    <th>Eerstvolgende levering</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leveringList as $levering) <!-- Foreach Loop to display all levering details -->
                <tr>
                    <td>{{$levering->product->naam}}</td>
                    <td>{{$levering->datumLevering}}</td>
                    <td>{{$levering->aantal}}</td>
                    <td>{{$levering->datumEerstVolgendeLevering}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>