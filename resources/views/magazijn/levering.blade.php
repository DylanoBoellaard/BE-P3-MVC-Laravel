<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leveringsinformatie</title>
    @vite(['resources/scss/magazijn/levering.scss', 'resources/scss/magazijn/global.scss'])
</head>

<body>
    <div class="container">
        <h1>Leveringsinformatie</h1>
        <!-- Display Leverancier info -->
        <div id="leverancierList">
            @foreach($leverancierList as $leverancier)
            <p><span>Naam leverancier:</span> {{$leverancier->naam}}</p>
            <p><span>contactpersoon leverancier:</span> {{$leverancier->contactPersoon}}</p>
            <p><span>Leverancier nummer:</span> {{$leverancier->leverancierNummer}}</p>
            <p><span>Mobiel:</span> {{$leverancier->mobiel}}</p>
            @endforeach
            <a href="{{route('magazijn.index')}}">Terug naar magazijn overzicht</a>
        </div>

        <!-- If a message has been sent... -->
        @if(isset($message))
        <p>Redirecting in <span id="countdown">4</span> seconds.</p>
        <p>{{$message}}</p>
        <script>
            let countdown = 4; // Set the initial countdown time (in seconds)

            function updateCountdown() {
                countdown -= 1;
                document.getElementById('countdown').textContent = countdown;

                if (countdown <= 0) {
                    // Redirect the user to the homepage the countdown has reached 0 seconds (or less).
                    window.location.href = "{{ route('magazijn.index') }}";
                } else {
                    // Update the countdown every 1 second
                    setTimeout(updateCountdown, 1000);
                }
            }

            // Start the countdown when the page loads
            setTimeout(updateCountdown, 1000);
        </script>
        @else
        <table>
            <thead>
                <tr>
                    <th>Naam product</th>
                    <th>Datum laatste levering</th>
                    <th>Aantal</th>
                    <th>Eerstvolgende levering</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leveringList as $levering) <!-- Foreach Loop to display all levering details -->
                <tr>
                    <td>{{$levering->product->naam}}</td>
                    <td>{{$levering->datumLevering}}</td>
                    <td>{{$levering->aantal}}</td>
                    <td>{{$levering->datumEerstVolgendeLevering}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</body>

</html>