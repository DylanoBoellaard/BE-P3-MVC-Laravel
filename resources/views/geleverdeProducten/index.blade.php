<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overizcht geleverde producten</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>
<body>
    <div class="container">
        <h1>Overzicht geleverde producten</h1>

        <!-- Date Filter Form -->
        <form action="{{ route('geleverdeProducten.index_filter') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="startdate">Startdatum:</label>
                <input type="date" id="startdate" name="startdate" value="{{ $startDate }}">
            </div>
            <div class="form-group">
                <label for="enddate">Einddatum:</label>
                <input type="date" id="enddate" name="enddate" value="{{ $endDate }}">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>


        <!-- Reset button to remove the filter -->
        <a href="{{ route('geleverdeProducten.index') }}" class="btn btn-secondary">Reset</a>

        <table>
            <thead>
                <tr>
                    <th>Naam leverancier</th>
                    <th>Contactpersoon</th>
                    <th>Productnaam</th>
                    <th>Totaal geleverd</th>
                    <th>Specificatie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($geleverdeProducten as $product) <!-- Foreach Loop to display all product details -->
                <tr>

                    <td>{{$product->leverancierNaam}}</td>
                    <td>{{$product->contactPersoon}}</td>
                    <td>{{$product->productNaam}}</td>
                    <td>{{$product->totaalGeleverd}}</td>
                    <td>
                        <a href="{{route('geleverdeProducten.index')}}">
                            <img class="small-img" src="/img/Box.png" alt="Box.png">
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>