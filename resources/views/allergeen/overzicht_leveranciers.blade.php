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
        <h1>Overzicht leveranciers</h1>

        <table>
            <thead>
                <tr>
                    <th>Naam leverancier</th>
                    <th>Contactpersoon</th>
                    <th>Mobiel</th>
                    <th>Stad</th>
                    <th>Straat</th>
                    <th>Huisnummer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leverancierList as $leverancier) <!-- Foreach Loop to display all details -->
                <tr>
                    <td>{{$leverancier->naam}}</td>
                    <td>{{$leverancier->contactPersoon}}</td>
                    <td>{{$leverancier->mobiel}}</td>
                    
                    <!-- If contact details are null, display message
                            Else, display details -->
                    @if(is_null($leverancier->stad) && is_null($leverancier->straat) && is_null($leverancier->huisnummer))
                    <td colspan="3">Er zijn geen adresgegevens bekend</td>
                    @else
                    <td>{{$leverancier->stad}}</td>
                    <td>{{$leverancier->straat}}</td>
                    <td>{{$leverancier->huisnummer}}</td>
                    @endif
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>