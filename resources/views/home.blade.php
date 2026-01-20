<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabellone Treni</title>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #222;
            color: #ffaa00; /* Tipico colore ambra dei tabelloni */
            font-family: 'Share Tech Mono', monospace;
            display: flex;
            justify-content: center;
            padding: 50px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
            box-shadow: 0 0 20px rgba(255, 170, 0, 0.2);
        }
        th, td {
            border: 1px solid #444;
            padding: 15px;
            text-align: left;
            text-transform: uppercase;
        }
        th {
            background-color: #111;
            font-size: 1.2rem;
            letter-spacing: 2px;
        }
        tr:nth-child(even) {
            background-color: #2a2a2a;
        }
        .cancelled {
            color: #ff4444;
            animation: blink 1s infinite;
        }
        @keyframes blink {
            50% { opacity: 0.5; }
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>Compagnia</th>
                <th>Treno</th>
                <th>Partenza</th>
                <th>Arrivo</th>
                <th>Orario</th>
                <th>Stato</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr>
                    <td>{{ $train->company }}</td>
                    <td>{{ $train->train_code }}</td>
                    <td>{{ $train->departure_station }}</td>
                    <td>{{ $train->arrival_station }}</td>
                    <td>{{ \Carbon\Carbon::parse($train->departure_time)->format('H:i') }}</td>
                    <td>
                        @if ($train->is_cancelled)
                            <span class="cancelled">CANCELLATO</span>
                        @elseif (!$train->on_time)
                            <span style="color: yellow;">IN RITARDO</span>
                        @else
                            IN ORARIO
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>