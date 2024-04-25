<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazijn overzicht</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>
<body>
    <div class="container">
        <h1>Overzicht magazijn Jamin</h1>
        <table>
            <thead>
                <tr>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th>verpakkings eenheid</th>
                    <th>Aantal aanwezig</th>
                    <th>Allergenen info</th>
                    <th>Leverantie info</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productList as $product) <!-- Foreach Loop to display all product details -->
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                </tr>
                @empty
                <tr>
                    <td>No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>