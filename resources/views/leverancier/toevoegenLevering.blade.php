<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoegen levering</title>
</head>
<body>
    <div class="container">
        <h1>Geleverde Producten</h1>

        <div id="productInfo">
            <p><span>Naam leverancier:</span> {{$leverancierInfo->naam}}</p>
            <p><span>Contactpersoon:</span> {{$leverancierInfo->contactPersoon}}</p>
            <p><span>Mobiel:</span> {{$leverancierInfo->mobiel}}</p>
        </div>

        <div>
            <form action="{{ route('leverancier.storeLevering', ['productId' => $productId, 'leverancierId' => $leverancierInfo->id]) }}" method="POST">
                @csrf
                <label for="aantal">Aantal producteenheden</label>
                <input type="number" name="aantal" id="aantal" required>
                <label for="datum">Datum eerstvolgende levering</label>
                <input type="date" name="datum" id="datum" required>
                <input type="submit" value="Sla op">
            </form>
        </div>
    </div>
</body>
</html>