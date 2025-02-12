<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Kezelőfelület</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Film Kategória</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">{{ $category->nev }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-md">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    @if($movies && count($movies) > 0)
                        @foreach ($movies as $movie)
                        <div class="col-xxl-6">
                            <div class="card card-flush h-md-100">
                                <div class="card-body py-9">
                                    <div class="row gx-9 h-100">
                                        <div class="col-sm-6 mb-10 mb-sm-0">
                                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100" style="background-size: 100% 100%;background-image:url('{{ $movie->filmkep }}')">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="d-flex flex-column h-100">
                                                <div class="mb-7">
                                                    <div class="d-flex flex-stack mb-6">
                                                        <div class="flex-shrink-0 me-5">
                                                            <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">Kiadás éve - {{ $movie->film_ev ?? 'N/A' }}</span>
                                                            <span class="text-gray-800 fs-3 fw-bold">{{ $movie->filmnev }}</span>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                        <div class="d-flex align-items-center me-5 me-xl-13">
                                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                                <img src="{{ $movie->korhatar }}" class="" alt="kiskép" />
                                                            </div>
                                                            <div class="m-0">
                                                                <span class="fw-semibold text-gray-400 d-block fs-8">Ajánlott</span>
                                                                <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-7">Korhatár</a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                                <span class="symbol-label bg-success">
                                                                    <i class="ki-duotone ki-abstract-41 fs-5 text-white">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </span>
                                                            </div>
                                                            <div class="m-0">
                                                                <span class="fw-semibold text-gray-400 d-block fs-8">Jegy ár</span>
                                                                <span class="fw-bold text-gray-800 fs-7">{{ number_format($movie->jegyar, 0, ',', '.') }} Ft</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-6">
                                                    <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                                                        <p>{{ $movie->filmleiras }}</p>
                                                    </span>
                                                    <div class="d-flex">
                                                        <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                            <span class="fs-6 text-gray-700 fw-bold">{{ $movie->vetitesidatum }}</span>
                                                            <div class="fw-semibold text-gray-400">Vetítés időpont</div>
                                                        </div>
                                                        <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                            <span class="fs-6 text-gray-700 fw-bold">{{ $movie->idotartam }}</span>
                                                            <div class="fw-semibold text-gray-400">Időtartam</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack mt-auto bd-highlight">
                                                    <div class="symbol-group symbol-hover flex-nowrap">
                                                        <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $movie->darabszam }} darab</span>
                                                    </div>
                                                    <div class="text-center mt-5 mb-9">
                                                        @if($movie->foglalhato > 0)
                                                        <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan2">Lefoglalás</a>
                                                        @else
                                                        <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal">Nem foglalható</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{ $movies->links() }}
                    @else 
                    <div class="d-flex flex-column flex-center text-center p-10" bis_skin_checked="1">
                        <div class="card card-flush w-lg-650px py-5" bis_skin_checked="1">
                            <div class="card-body py-15 py-lg-20" bis_skin_checked="1">
                                <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Renszer hiba</h1>
                                <div class="fw-semibold fs-6 text-gray-500 mb-7" bis_skin_checked="1">A(z) <b>{{ $category->nev }}</b> kategóriában tartalom nem található. 
                                    <p>Ne aggódj! Már dolgozunk a hiba javításán!</p></div>
                                <div class="mb-3" bis_skin_checked="1">
                                    <img src="{{ asset('assets/assets/media/auth/404-error.png') }}" class="mw-100 mh-300px theme-light-show" alt="">
                                    <img src="{{ asset('assets/assets/media/auth/404-error-dark.png') }}" class="mw-100 mh-300px theme-dark-show" alt="">
                                </div>
                                <div class="mb-0" bis_skin_checked="1">
                                    <a href="{{ route('mozi.fooldal') }}" class="btn btn-sm btn-primary" bis_skin_checked="1">Vissza a főoldalra.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
