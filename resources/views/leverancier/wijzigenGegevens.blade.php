<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzigen gegevens</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>
<body>
    <div class="container">
        <h1>Wijzigen</h1>
        <form action="{{ route('leverancier.updateLeverancier', $leverancierInfo[0]->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Fields for leveranciers table -->
            <input type="text" name="naam" value="{{ $leverancierInfo[0]->naam }}">
            <input type="text" name="contactPersoon" value="{{ $leverancierInfo[0]->contactPersoon }}">
            <input type="text" name="leverancierNummer" value="{{ $leverancierInfo[0]->leverancierNummer }}">
            <input type="text" name="mobiel" value="{{ $leverancierInfo[0]->mobiel }}">

            <!-- Fields for contact table -->
            <input type="text" name="straat" value="{{ $leverancierInfo[0]->straat }}">
            <input type="text" name="huisnummer" value="{{ $leverancierInfo[0]->huisnummer }}">
            <input type="text" name="postcode" value="{{ $leverancierInfo[0]->postcode }}">
            <input type="text" name="stad" value="{{ $leverancierInfo[0]->stad }}">

            <button type="submit">Sla op</button>
        </form>
    </div>
</body>
</html>