<html lang="en">
    <head>
    
    @include('components.header')

    <!-- THEME SETTINGS -->
        <style>
        :root {
        --color-indigo-50: 240 249 255;
        --color-indigo-100: 224 242 254;
        --color-indigo-200: 186 230 253;
        --color-indigo-300: 125 211 252;
        --color-indigo-400: 56 189 248;
        --color-indigo-500: 14 165 233;
        --color-indigo-600: 2 132 199;
        --color-indigo-700: 3 105 161;
        --color-indigo-800: 7 89 133;
        --color-indigo-900: 12 74 110;
        --color-voon-950: 8 8 8;
        --color-voon-900: 10 10 10;
        --color-voon-800: 14 14 14;
        --color-voon-700: 18 18 18;
        --color-voon-background: 18 18 18;
        --color-voon-card: 14 14 14;
        --color-neutral-900: 23 23 23;
        --color-zinc-600: 82 82 91;
    }
    </style>

        
    <!-- CUSTOM CSS -->
    <style type="text/css">
            </style>

    <!-- ROLE CSS -->
    <style type="text/css">
                
                        
                        
                        
                        
                    </style>
    </head>
    <body x-data="body">
        <div id="app" bis_skin_checked="1">
            <main class="main" role="main" style="margin-bottom: 0 !important;">
                <div class="flex flex-col lg:grid lg:grid-cols-2 min-h-screen bg-voon-bg" bis_skin_checked="1">
                    
                    <!-- Left Section: Image and Text -->
                    <div class="relative hidden lg:flex items-center justify-center z-10" bis_skin_checked="1">
                        <div class="absolute overflow-hidden rounded-l-3xl bg-cover bg-center h-full w-full" bis_skin_checked="1" style="background-image:url(https://chromecinema.hu/assets/fooldal/images/bg.png);">
                        </div>
                        <div class="relative z-20" bis_skin_checked="1">
                            <img class="w-1/4 mx-auto" src="https://chromecinema.hu/assets/mozi/img/mobile-default-dark.png" alt="">
                            <h2 class="font-bold text-3xl text-center text-white">ChromeCinema</h2>
                            <p class="text-white/75 pl-2" style="display: block; margin-block-start: 1em; margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; width: 80%; text-align: center; margin-left: 10%;">
                                Lépj be a mozi világába, vásárolj jegyet a neked tetsző filmre, mellé egy jó nassolnivalót, és élvezd a mozi világát.
                            </p>
                        </div>
                    </div>
    
                    <!-- Right Section: Main Content -->
                    <div class="relative grow flex items-center justify-center flex-col overflow-hidden px-6 py-12" bis_skin_checked="1">
                        {{ $slot }}
                        <div class="absolute -bottom-6 left-0 shadow-voon-bottom w-28 h-6" bis_skin_checked="1"></div>
                        <div class="p-10 absolute top-0 right-0" bis_skin_checked="1">
                            <a href="{{ route('fooldal') }}" class="flex items-center gap-3 bg-indigo-600/20 btn-before rounded-xl py-3 px-5 text-sm font-medium text-white hover:bg-indigo-600/40 relative hidden lg:flex items-center justify-center z-10">
                                <i class="fas fa-arrow-left"></i>Főoldal
                            </a>
                        </div>
                    </div>
    
                    <!-- Bottom Shadow Section -->
                    <div class="absolute -top-6 left-[calc(50%-8rem)] shadow-voon-bottom w-64 h-6" bis_skin_checked="1"></div>
                </div>
            </main>
        </div>
    
        @include('components.scripts')
    </body>
    
</html>
