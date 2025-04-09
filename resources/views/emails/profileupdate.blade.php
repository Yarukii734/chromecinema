<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil frissítve</title>
    <!-- Google Fonts import -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Inline CSS -->
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #6b46c1, #4299e1);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #6b46c1, #4299e1);
            color: white;
            padding: 12px 24px;
            border-radius: 9999px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #553c9a, #3182ce);
        }
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }
        h1 {
            font-family: 'Poppins', Arial, sans-serif;
            font-weight: 600;
        }
        p {
            font-family: 'Poppins', Arial, sans-serif;
            font-weight: 400;
        }
    </style>
</head>
<body style="background-color: #f3f4f6; padding: 20px; font-family: 'Poppins', Arial, sans-serif;">
    <!-- Konténer -->
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <!-- Fejléc -->
        <div class="bg-gradient" style="padding: 32px; text-align: center;">
            <!-- Logó -->
            <img src="{{ asset('assets/mozi/img/mobile-default-dark.png') }}" alt="Mozi Logo" style="display: block; margin: 0 auto 20px auto; width: 200px;">
            <h1 style="font-size: 28px; font-weight: 600; color: white; margin-bottom: 16px;">Profil frissítve</h1>
            <p style="font-size: 16px; color: #e2e8f0;">Kedves {{ $user->keresztnev }}, a profilját sikeresen frissítettük!</p>
        </div>

        <!-- Tartalom -->
        <div style="padding: 24px;">
            <div style="margin-bottom: 24px;">
                <p style="font-size: 16px; color: #4a5568; margin-bottom: 16px;">Az új adatai az alábbiak:</p>
                <div style="background-color: #f7fafc; padding: 16px; border-radius: 8px; margin-bottom: 12px;">
                    <p style="font-size: 14px; color: #718096;">Vezetéknév</p>
                    <p style="font-size: 16px; color: #2d3748; font-weight: 600;">{{ $user->vezeteknev }}</p>
                </div>
                <div style="background-color: #f7fafc; padding: 16px; border-radius: 8px; margin-bottom: 12px;">
                    <p style="font-size: 14px; color: #718096;">Keresztnév</p>
                    <p style="font-size: 16px; color: #2d3748; font-weight: 600;">{{ $user->keresztnev }}</p>
                </div>
                <div style="background-color: #f7fafc; padding: 16px; border-radius: 8px; margin-bottom: 12px;">
                    <p style="font-size: 14px; color: #718096;">Felhasználónév</p>
                    <p style="font-size: 16px; color: #2d3748; font-weight: 600;">{{ $user->felhasznalonev }}</p>
                </div>
                <div style="background-color: #f7fafc; padding: 16px; border-radius: 8px; margin-bottom: 12px;">
                    <p style="font-size: 14px; color: #718096;">Email cím</p>
                    <p style="font-size: 16px; color: #4299e1; font-weight: 600;">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Gomb -->
            <div style="text-align: center;">
                <a href="{{ route('mozi.fiok') }}" class="btn-gradient" style="background: linear-gradient(135deg, #6b46c1, #4299e1); color: white; padding: 12px 24px; border-radius: 9999px; text-decoration: none; display: inline-block; font-weight: bold;">
                    Profil megtekintése
                </a>
            </div>
        </div>

        <!-- Lábléc -->
        <div style="background-color: #f7fafc; padding: 16px; text-align: center;">
            <p style="font-size: 12px; color: #718096;">Ha nem te frissítetted a profilod, kérlek, hagyd figyelmen kívül ezt az e-mailt.</p>
        </div>
    </div>
</body>
</html>
