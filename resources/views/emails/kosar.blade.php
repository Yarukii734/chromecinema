<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosár tartalma</title>
    <!-- Inline Tailwind CSS -->
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-family: 'Poppins', Arial, sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #1a365d;
            text-align: center;
            margin-bottom: 20px;
            padding-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #2b6cb0;
            color: white;
            font-weight: 600;
        }
        td {
            font-size: 14px;
            color: #4a5568;
        }
        .total {
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            margin-top: 20px;
            padding: 12px;
            background-color: #2b6cb0;
            color: white;
            border-radius: 8px;
        }
        .item-logo {
            width: 50px;
            height: auto;
            border-radius: 8px;
        }
        .logo {
            display: block;
            margin: 20px auto;
            width: 200px;
        }
        .footer {
            font-size: 12px;
            text-align: center;
            margin-top: 30px;
            color: #718096;
            padding: 20px;
            background-color: #f7fafc;
        }
    </style>
    <!-- Google Fonts import -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="email-container">
        <!-- Logo -->
        <img class="logo" src="{{ asset('assets/mozi/img/mobile-default-dark.png') }}" alt="Mozi Logo">

        <!-- Cím -->
        <h2>Kosár tartalma</h2>

        <!-- Táblázat -->
        <table>
            <thead>
                <tr>
                    <th>Logó</th>
                    <th>Név</th>
                    <th>Darabszám</th>
                    <th>Ár</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        @if($item->type === 'snack')
                            <img src="{{ $item->snack->kep }}" class="item-logo" alt="{{ $item->snack->nev }}">
                        @elseif($item->type === 'movie')
                            <img src="{{ $item->movie->filmkep }}" class="item-logo" alt="{{ $item->movie->filmnev }}">
                        @endif
                    </td>
                    <td>{{ $item->snack->nev ?? $item->movie->filmnev }}</td>
                    <td>{{ $item->darabszam }}</td>
                    <td>{{ number_format($item->ar * $item->darabszam, 0, ',', '.') }} Ft</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Végösszeg -->
        <p class="total">Végösszeg: <b>{{ number_format($totalPrice, 0, ',', '.') }} Ft</b></p>
    </div>

    <!-- Lábléc -->
    <div class="footer">
        <p>Ez az email automatikusan generálódott. Ha kérdése van, kérjük, lépjen kapcsolatba ügyfélszolgálatunkkal.</p>
    </div>
</body>
</html>
