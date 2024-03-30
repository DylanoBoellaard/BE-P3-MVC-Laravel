<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzigen gegevens</title>
</head>
<body>
<div class="container">
        <h1>Overzicht leveranciers</h1>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Leveranciernummer</th>
                    <th>Mobiel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$leverancierInfo->naam}}</td>
                    <td>{{$leverancierInfo->contactPersoon}}</td>
                    <td>{{$leverancierInfo->leverancierNummer}}</td>
                    <td>{{$leverancierInfo->mobiel}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>