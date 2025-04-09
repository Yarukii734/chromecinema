<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css"/>
    <link href="{{ asset('html/style/fontello.css') }}" rel="stylesheet" > 
    <link href="{{ asset('html/style/style62.css') }}" rel="stylesheet" >        
    <link href="{{ asset('html/style/fooldalstyle22.css') }}" rel="stylesheet" >  
    <title>{{ $title ?? 'Mozi' }}</title>
    <link rel="shortcut icon" href="https://i.imgur.com/bRsgxpF.png">
    <style>.preloader{position:fixed;height:100%;width:100%;background:#1c1c1c;z-index:10000;top:0;left:0;}</style>
</head>
<body>
    <div class="preloader"></div>
    <div class="close">
        <div class="hamburger">
            <span>

            </span>
        </div>
    </div>
    <header>
        <div class="wrapper">
            <nav>
                <ul>
                    <div class="left">
                        <a href="{{ route('fooldal') }}">
                            <li class="color-r color-hover-9">Főoldal</li>
                        </a>
                        <a href="#team">
                            <li class="color-r color-hover-9">Csapatunk</li>
                        </a>
                        <a href="#helpdesk">
                            <li class="color-r color-hover-9">Segítség</li>
                        </a>
                        <li class="webshop">
                            <a href="{{ route('bejelentkezes') }}">
                                <button class="green color-f">Belépés</button>
                            </a>
                        </li>
                    </div>
                    <div class="right">
                        <a href="https://tiktok.com/@ella.kirn" target="_blank">
                            <li class="social">
                                <button class="icon-button green color-f">
                                    <span class="fab fa-tiktok"></span>
                                </button>
                            </li>
                        </a>
                        <a href="https://discord.asterial.us" target="_blank">
                            <li class="social">
                                <button class="icon-button green color-f">
                                    <span class="fab fa-discord"></span>
                                </button>
                            </li>
                        </a>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
    <section class="landing" id="home">
        <div class="logo"></div>
        <h1 class="title shadow-3d" text="chromecinema.hu">chromecinema.hu</h1>
        <h2 class="subtitle" style="margin: 0px;">Magyarország egyik legegyedibb Mozi hálózata</h2>
    </section>
            {{ $slot }}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/notification.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@1.41.3/tsparticles.min.js"></script>
    <script type="text/javascript" src="https://chromecinema.hu/html/js/main9.js"></script>
</body>
</html>
