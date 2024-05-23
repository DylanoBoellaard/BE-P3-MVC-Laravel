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
                @if($geleverdeProducten->isEmpty())
                <tr>
                    <td colspan="5">Er zijn geen leveringen geweest van producten in deze periode</td>
                </tr>
                @else
                @foreach($geleverdeProducten as $product) <!-- Foreach Loop to display all product details -->
                <tr>
                    <td>{{$product->leverancierNaam}}</td>
                    <td>{{$product->contactPersoon}}</td>
                    <td>{{$product->productNaam}}</td>
                    <td>{{$product->totaalGeleverd}}</td>
                    <td>
                        <!-- If user submitted dates for the filter, send dates with product ID -->
                        @if ($startDate && $endDate)
                        <a href="{{ route('geleverdeProducten.specificatieProduct', [$product->id, $startDate, $endDate]) }}">
                            <img class="small-img" src="/img/Question.png" alt="Question.png">
                        </a>
                        <!-- On first page load OR if user did not submit dates for the filter, send 'all' as dates and product ID -->
                        @else
                        <a href="{{ route('geleverdeProducten.specificatieProduct', [$product->id, 'all', 'all']) }}">
                            <img class="small-img" src="/img/Question.png" alt="Question.png">
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>