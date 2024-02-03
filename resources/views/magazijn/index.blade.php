<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazijn overzicht</title>
</head>
<body>
    <h1>Overzicht magazijn Jamin</h1>

    <div class="container">
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
                @foreach($productList as $product) <!-- Foreach Loop to display all product details -->
                <tr>
                    <td>{{$product->barcode}}</td>
                    <td>{{$product->naam}}</td>
                    <td>{{$product->verpakkingsEenheid}}</td>
                    <td>{{$product->aantalAanwezig}}</td>
                    <td><a href="">
                            <img class="small-img" src="/img/Cross.png" alt="cross.png">
                        </a>
                    </td>
                    <td>
                        <a href="">
                            <img class="small-img" src="/img/question.png" alt="question.png">
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>