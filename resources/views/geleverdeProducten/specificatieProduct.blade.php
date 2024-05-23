<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specificatie geleverde Producten</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>
<body>
    <div class="container">
        <h1>Specificatie geleverde producten</h1>

        <!-- Display product info -->
        <div id="productInfo">
            <p><span>Startdatum:</span> {{ $startDate }}</p>
            <p><span>Einddatum:</span> {{ $endDate }}</p>

            <!-- If product details exists, display details -->
            @if($productDetails)
            <p><span>Productnaam:</span> {{ $productDetails->ProductNaam }}</p>
            <p><span>Allergenen:</span> {{ $productDetails->Allergenen }}</p>
            @endif
        </div>

        <table>
            <thead>
                <tr>
                    <th>Datum levering</th>
                    <th>Aantal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productDeliveryDetails as $product)
                <tr>
                    <td>{{ $product->datumLevering }}</td>
                    <td>{{ $product->aantal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>