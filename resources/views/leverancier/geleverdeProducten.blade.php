<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geleverde Producten</title>
    @vite(['resources/scss/magazijn/index.scss', 'resources/scss/magazijn/global.scss'])
</head>
<body>
    <div class="container">
        <h1>Geleverde Producten</h1>
        <!-- Display leverancier info -->
        <div id="productInfo">
            <p><span>Naam leverancier:</span> {{$leverancierInfo->naam}}</p>
            <p><span>Contactpersoon:</span> {{$leverancierInfo->contactPersoon}}</p>
            <p><span>Leverancier NR:</span> {{$leverancierInfo->leverancierNummer}}</p>
            <p><span>Mobiel:</span> {{$leverancierInfo->mobiel}}</p>
        </div>
        @if($leveringList->isEmpty())
        <p>Redirecting in <span id="countdown">3</span> seconds.</p>
        <p>Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin</p>

        <script>
            let countdown = 3; // Set the initial countdown time (in seconds)

            function updateCountdown() {
                countdown -= 1;
                document.getElementById('countdown').textContent = countdown;

                if (countdown <= 0) {
                    // Redirect the user to the homepage the countdown has reached 0 seconds (or less).
                    window.location.href = "{{ route('leverancier.index') }}";
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
                    <th>Aantal in magazijn</th>
                    <th>Verpakkingseenheid</th>
                    <th>Laatste levering</th>
                    <th>Nieuwe levering</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leveringList as $levering) <!-- Foreach Loop to display all product details -->
                <tr>
                    <td>{{$levering->naam}}</td>
                    <td>{{$levering->aantalAanwezig}}</td>
                    <td>{{$levering->verpakkingsEenheid}}</td>
                    <td>{{$levering->datumLevering}}</td>
                    <td>
                        <a href="{{route('leverancier.geleverdeProducten', [$levering -> naam])}}">
                            <img class="small-img" src="/img/Box.png" alt="Box.png">
                        </a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>