<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Allergenen</title>
</head>

<body>
    <h1>Overzicht Allergenen</h1>

    <div class="container">
        <!-- Display product info info -->
        <div id="productInfo">
            <p><span>Naam:</span> {{$productInfo->naam}}</p>
            <p><span>Barcode:</span> {{$productInfo->barcode}}</p>
        </div>

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
                    <th>Naam</th>
                    <th>Omschrijving</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allergenenList as $allergeen) <!-- Foreach Loop to display all allergenen details -->
                <tr>
                    <td>{{$allergeen->naam}}</td>
                    <td>{{$allergeen->omschrijving}}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</body>

</html>