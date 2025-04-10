<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Segítségek</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('mozi.fooldal') }}" class="text-muted text-hover-primary">Segítségek</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Rólunk</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <div class="alert alert-info alert-warning fade show" role="alert" wire:offline>
                    <strong>Kapcsolati probléma!</strong> Úgy tűnik, hogy az internetkapcsolat megszakadt. Az adatok frissítése valószínűleg nem fog megfelelően működni. Kérjük, ellenőrizd a kapcsolatot.
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl mb-5">
                <!--begin::Hero card-->
                <div class="card mb-12">
                    <!--begin::Hero body-->
                    <div class="card-body flex-column p-5">
                        <!--begin::Hero content-->
                        <div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                                <!--begin::Title-->
                                <h1 class="fw-bold fs-4 fs-lg-1 text-gray-800 mb-5 mb-lg-2">Szeretnéd tudni hogyan alakultunk?</h1>
                                <div class="fs-5 text-gray-600 fw-semibold">Itt választ kaphatsz a kérdéseidre.</div>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div class="flex-equal d-flex justify-content-center align-items-end ms-5">
                                <!--begin::Illustration-->
                                <img src="{{ asset('assets/assets/media/illustrations/sketchy-1/20.png') }}" alt="" class="mw-100 mh-125px mh-lg-275px mb-lg-n12">
                                <!--end::Illustration-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Hero content-->
                        <!--begin::Hero nav-->
                        <!--end::Hero nav-->
                    </div>
                    <!--end::Hero body-->
                </div>
                <!--end::Hero card-->
                <!--begin::About card-->
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-10 p-lg-15">
                        <!--begin::Content main-->
                        <div class="mb-14">
                            <!--begin::Heading-->
                            <div class="mb-12">
                                <!--begin::Title-->
                                <h1 class="fs-2x text-dark mb-4">ChromeCinema</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-gray-600 fw-semibold">Egy spontán kitalált weboldal , a weboldal elkészítése egy szoftver fejlesztő és tesztelő szakmához szükséges.<br>Remélhetőleg könnyen vesszük az akadályokat, mottonk ha nincs asszony jó a szomszédé is!! </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <!--begin::Table-->

                            <!--end::Table-->
                            <!--begin::Block-->
                            <div class="mb-20 pb-lg-20">
                                <!--begin::Title-->
                                <h2 class="fw-bold text-dark mb-2">Rácz Ferenc: </h2>
                                <!--end::Title-->
                                <!--begin::List-->
                                <div class="fs-4 fw-semibold text-gray-700 mb-6"><span class="text-dark">Szerepköröm:</span> Adatok feltöltése, ötlet adó a mozi kitalálója és segédje</div>

                                <!--end::List-->
                                <!--begin::Text-->
                               
                                <!--end::Text-->
                                <!--begin::Title-->
                                <h2 class="fw-bold text-dark mb-2">Bojti Patrik:</h2>
                                <!--end::Title-->
                                <!--begin::List-->
                                <div class="fs-4 fw-semibold text-gray-700"><span class="text-dark">Szerepköröm:</span> A mozi hátterének: <span class="text-dark">(backend)</span> fejlesztője és megalkotója, és kezelő felület felépítése.</div>
                                <div class="fs-4 fw-semibold text-gray-700 mb-6">Fizetési rendszer integrálás, API készítés.</div>
                                <!--end::List-->
                                <!--begin::Text-->
                               
                                <!--end::Text-->
                                <!--begin::Title-->
                                <h2 class="fw-bold text-dark mb-8">Miért csináljátok ez a projektet?</h2>
                                <!--end::Title-->
                                <div class="fs-4 fw-semibold text-gray-700">Az ötlet egy már meglévő projekt feladatból lett átmerítve.</div>
                                <div class="fs-4 fw-semibold text-gray-700 mb-4">Azért választottuk ezt a projektet mert minden kritériumnak megfelel ami a sikeres vizsgához szükséges.</div>
                                <!--begin::List-->
                                <h4 class="fw-bold text-dark mb-3">Vizsga kritériumai:</h4>
                                <ul class="fs-4 fw-semibold mb-6">
                                    <li>
                                        <span class="text-gray-700">Adatbázis: Mint például: Főoldal , Film kategória , Regisztráció/Bejelentkezés , Kosár.</span>
                                    </li>
                                    <li class="my-2">
                                        <span class="text-gray-700">Dokumentációk: 3 db dokumentáció szükséges a programmhoz</span>
                                        <ul class="fs-4 fw-semibold mb-6">
                                            <li>
                                                <span class="text-gray-700">Fejlesztői » ide írjuk a fejlesztéssel kapcsolatos dolgokat.</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Tesztelői » ide tesztelői csapatunk írja ki milyen hibákat, észrevételeket vettek észre.</span>
                                            </li>
                                            <li>
                                                <span class="text-gray-700">Felhasználói » itt a felhasználó megtekintheti a a weboldalunk müködését mi hol található.</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="text-gray-700">Angol kommunikáció: 5 perc</span>
                                    </li>
                                    <li>
                                        <span class="text-gray-700">A saját feladat kidolgozásának a bemutatása.</span>
                                    </li>
                                </ul>
                                <!--end::List-->
                                <!--begin::Text-->
                                <h2 class="fw-bold text-dark mb-8">Célunk a jövőre nézve?</h2>
                                <div class="fs-4 fw-semibold text-gray-700">Csapatunk célja a sikeres vizsgának letétele a legmagasabb eredmény elérése. A sikeres vizsga letétele után szeretnénk ezzel a projektel foglalkozni utánna is. Azért erre esett a választás mivel nagyon mozi weboldala eléggé sablon és nem tesz eleget a modern megjelenéshez.</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Block-->
                            <!--end::Body-->
                        </div>
                        <!--end::Content main-->
                        <!--begin::Card-->
                        <!--end::Card-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::About card-->
                <!--begin::Modal - Support Center - Create Ticket-->
                <!--end::Modal - Support Center - Create Ticket-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <!--end::Footer-->
</div>