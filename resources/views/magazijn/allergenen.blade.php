<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Allergenen</title>
</head>
<body>
    <h1>Overzicht Allergenen</h1>

    <div class="container">
        <!-- Display product info info -->
        <div id="productInfo">
            <p><span>Naam:</span> {{$productInfo->naam}}</p>
            <p><span>Barcode:</span> {{$productInfo->barcode}}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allergenenList as $allergeen) <!-- Foreach Loop to display all allergenen details -->
                <tr>
                    <td>{{$allergeen->naam}}</td>
                    <td>{{$allergeen->omschrijving}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>