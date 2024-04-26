<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>

<body>
    <div class="container">
        <h1>Overzicht allergenen</h1>

        <!-- Allergenen filter -->
        <form action="{{ route('allergeen.index.filter') }}" method="GET">
            @csrf

            <select name="allergeen" id="allergeen">
                <option value="Gluten">Gluten</option>
                <option value="Gelatine">Gelatine</option>
                <option value="AZO-Kleurstof">AZO-Kleurstof</option>
                <option value="Lactose">Lactose</option>
                <option value="Soja">Soja</option>
            </select>

            <input type="submit" value="Maak selectie">
        </form>

        <!-- Reset button to remove the filter -->
        <a href="{{ route('allergeen.index') }}" class="btn btn-secondary">Reset</a>

        <table>
            <thead>
                <tr>
                    <th>Naam product</th>
                    <th>Naam allergeen</th>
                    <th>Omschrijving</th>
                    <th>Aantal aanwezig</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allergenenList as $allergeen) <!-- Foreach Loop to display all product details -->
                <tr>

                    <td>{{$allergeen->naam}}</td>
                    <td>{{$allergeen->allergenen_naam}}</td>
                    <td>{{$allergeen->allergenen_omschrijving}}</td>
                    <td>{{$allergeen->aantalAanwezig}}</td>
                    <td>
                        <a href="{{route('allergeen.overzicht_leveranciers', [$allergeen -> id])}}">
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