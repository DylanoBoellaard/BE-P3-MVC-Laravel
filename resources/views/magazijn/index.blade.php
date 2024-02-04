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
                @foreach($productList as $product) <!-- Foreach Loop to display all product details -->
                <tr>
                    <td>{{$product->barcode}}</td>
                    <td>{{$product->naam}}</td>
                    <td>{{$product->verpakkingsEenheid}}</td>
                    <td>{{$product->aantalAanwezig}}</td>
                    <td><a href="{{route('magazijn.allergenen', [$product -> id])}}">
                            <img class="small-img" src="/img/RedCross.png" alt="cross.png">
                        </a>
                    </td>
                    <td>
                        <a href="{{route('magazijn.levering', [$product -> id])}}">
                            <img class="small-img" src="/img/Question.png" alt="question.png">
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>