<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6" >
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack" >
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3" >
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Kezelőfelület</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('mozi.fooldal') }}" class="text-muted text-hover-primary">Főoldal</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Fiók kezelés</li>
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
    <div id="kt_app_content" class="app-content flex-column-fluid" bis_skin_checked="1">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl" bis_skin_checked="1">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10" bis_skin_checked="1">
                <div class="card-body pt-9 pb-0" bis_skin_checked="1">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap" bis_skin_checked="1">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4" bis_skin_checked="1">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative" bis_skin_checked="1">
                                <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" alt="image">
                            
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1" bis_skin_checked="1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2" bis_skin_checked="1">
                                <!--begin::User-->
                                <div class="d-flex flex-column" bis_skin_checked="1">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2" bis_skin_checked="1">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->vezeteknev }} {{ $user->keresztnev }}</a>
                                        <a>
                                            @if($user->admin == 1)
                                            <i class="ki-duotone ki-verify fs-1 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            @endif

                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2" bis_skin_checked="1">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>

                                        @if($user->admin == 1)
                                            Adminisztrátor
                                        @else
                                            Felhasználó
                                        @endif
                                    
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-pencil fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            </i>{{ $user->felhasznalonev }}</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <i class="ki-duotone ki-sms fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>{{ $user->email }} </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex my-4" bis_skin_checked="1">
                                    <!--begin::Menu-->
                                    <div class="me-0" bis_skin_checked="1">
                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true" bis_skin_checked="1">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3" bis_skin_checked="1">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase" bis_skin_checked="1">Payments</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" bis_skin_checked="1">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" bis_skin_checked="1">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                <span class="ms-2" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
                                                    <i class="ki-duotone ki-information fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" bis_skin_checked="1">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" bis_skin_checked="1">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4" bis_skin_checked="1">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" bis_skin_checked="1">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" bis_skin_checked="1">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" bis_skin_checked="1">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2" bis_skin_checked="1"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" bis_skin_checked="1">
                                                        <div class="menu-content px-3" bis_skin_checked="1">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1" bis_skin_checked="1">
                                                <a href="#" class="menu-link px-3">Beállítások</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack" bis_skin_checked="1">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8" bis_skin_checked="1">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap" bis_skin_checked="1">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3" bis_skin_checked="1">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1" bis_skin_checked="1">{{ number_format(auth()->user()->total_spent, 0, ',', '.') }} Ft</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400" bis_skin_checked="1">Elköltött Pénz</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3" bis_skin_checked="1">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ auth()->user()->purchasedMoviesCountProfile() }}" data-kt-initialized="1" bis_skin_checked="1">{{ auth()->user()->purchasedMoviesCountProfile() }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400" bis_skin_checked="1">Vásárolt Jegy</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" id="attekintes-line-tab" data-bs-toggle="tab" href="#attekintes" role="tab" aria-controls="attekintes" aria-selected="true">Áttekintés</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" id="beallitasok-line-tab" data-bs-toggle="tab" href="#beallitasok" role="tab" aria-controls="beallitasok" aria-selected="true">Beállítások</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" id="biztonsag-line-tab" data-bs-toggle="tab" href="#biztonsag" role="tab" aria-controls="biztonsag" aria-selected="true">Biztonság</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::details View-->
            <div class="tab-content">
                <livewire:mozi.fiok.attekintes />
                <livewire:mozi.fiok.beallitasok />
                <livewire:mozi.fiok.biztonsag />
            </div>
            <!--end::details View-->
        </div>
        <!--end::Content container-->
    </div>

    <style>
        ::-webkit-scrollbar {
        display: none;
}
    </style>
    <!--end::Content-->
</div>