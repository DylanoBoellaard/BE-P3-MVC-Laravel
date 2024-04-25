<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzigen gegevens</title>
    @vite(['resources/scss/magazijn/wijzigen.scss', 'resources/scss/magazijn/global.scss'])
</head>

<body>
    <div class="container">
        <h1>Wijzig leveranciergegevens</h1>
        <form action="{{ route('leverancier.updateLeverancier', $leverancierInfo[0]->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Fields for leveranciers table -->
            <div class="row">
                <label for="naam">Naam:</label>
                <input type="text" name="naam" value="{{ $leverancierInfo[0]->naam }}">
            </div>
            <div class="row">
                <label for="contactPersoon">Contactpersoon:</label>
                <input type="text" name="contactPersoon" value="{{ $leverancierInfo[0]->contactPersoon }}">
            </div>
            <div class="row">
                <label for="leverancierNummer">leverancier nummer:</label>
                <input type="text" name="leverancierNummer" value="{{ $leverancierInfo[0]->leverancierNummer }}">
            </div>
            <div class="row">
                <label for="mobiel">Mobiel:</label>
                <input type="text" name="mobiel" value="{{ $leverancierInfo[0]->mobiel }}">
            </div>

            <!-- Fields for contact table -->
            <div class="row">
                <label for="straat">Straat:</label>
                <input type="text" name="straat" value="{{ $leverancierInfo[0]->straat }}">
            </div>
            <div class="row">
                <label for="huisnummer">Huisnummer:</label>
                <input type="text" name="huisnummer" value="{{ $leverancierInfo[0]->huisnummer }}">
            </div>
            <div class="row">
                <label for="postcode">Postcode:</label>
                <input type="text" name="postcode" value="{{ $leverancierInfo[0]->postcode }}">
            </div>
            <div class="row">
                <label for="stad">Stad:</label>
                <input type="text" name="stad" value="{{ $leverancierInfo[0]->stad }}">
            </div>

            <div class="navigation">
                <button type="submit">Sla op</button>
                <a id="terug" href="javascript:history.back()">Terug</a>
                <a id="home" href="{{route('home')}}">Home</a>
            </div>
        </form>
    </div>
</body>

</html>