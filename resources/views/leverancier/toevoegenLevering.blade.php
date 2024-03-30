<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoegen levering</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
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
                <label for="aantal"><span>Aantal producteenheden</span></label>
                <input type="number" name="aantal" id="aantal" value="{{ old('aantal') }}" required>
                <label for="datum"><span>Datum eerstvolgende levering</span></label>
                <input type="date" name="datum" id="datum" value="{{ old('datum') }}" required>
                <input type="submit" value="Sla op">
            </form>

            @if(Session::has('error'))
            <div class="alert alert-error">
                {{ Session::get('error') }}
            </div>
            @endif
        </div>
    </div>
</body>
</html>