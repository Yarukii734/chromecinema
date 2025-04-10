<div class="app-main flex-column flex-row-fluid" id="kt_app_main" bis_skin_checked="1">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid" bis_skin_checked="1">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6" bis_skin_checked="1">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Kezelőfelület</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('mozi.fooldal') }}" class="text-muted text-hover-primary">Adminisztráció</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Felhasználó Kezelés</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
       
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid" bis_skin_checked="1" data-select2-id="select2-data-kt_app_content">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl" bis_skin_checked="1" data-select2-id="select2-data-kt_app_content_container">
                <!--begin::Stats-->
                <div class="row gx-6 gx-xl-9" bis_skin_checked="1">
                    <!-- Regisztrált felhasználó card -->
                    <div class="col-lg-6 col-xxl-4 mb-4 mb-sm-5" bis_skin_checked="1">
                        <div class="card h-100" bis_skin_checked="1">
                            <div class="card-body p-9" bis_skin_checked="1">
                                <div class="fs-2hx fw-bold" bis_skin_checked="1">{{ $userCount }}</div>
                                <div class="fs-4 fw-semibold text-gray-400 mb-7" bis_skin_checked="1">Regisztrált felhasználó</div>
                            </div>
                            
                        </div>
                    </div>
                
                    <!-- Összes felhasználó költése card -->
                    <div class="col-lg-6 col-xxl-4 mb-4 mb-sm-5" bis_skin_checked="1">
                        <div class="card h-100" bis_skin_checked="1">
                            <div class="card-body p-9" bis_skin_checked="1">
                                <div class="fs-2hx fw-bold" bis_skin_checked="1">{{ $osszesKoltes }}</div>
                                <div class="fs-4 fw-semibold text-gray-400 mb-7" bis_skin_checked="1">Összes felhasználó költése</div>
                                <div class="fs-6 justify-content-between mb-4" bis_skin_checked="1">
                                    <div class="fw-semibold" bis_skin_checked="1">Új ügyfelek száma (elmúlt 30 nap)</div>
                                    <div class="d-flex fw-bold" bis_skin_checked="1">
                                        <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>{{ $ujUgyfelekSzama }}
                                    </div>
                                </div>
                                <div class="separator separator-dashed" bis_skin_checked="1"></div>
                                <div class="fs-6 justify-content-between my-4" bis_skin_checked="1">
                                    <div class="fw-semibold" bis_skin_checked="1">Legutóbbi vásárlás</div>
                                    <div class="d-flex fw-bold" bis_skin_checked="1">
                                        <i class="ki-duotone ki-arrow-down-left fs-3 me-1 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>{{ $legutobbiVasarlas }}
                                    </div>
                                </div>
                                <div class="separator separator-dashed" bis_skin_checked="1"></div>
                                <div class="fs-6 justify-content-between mt-4" bis_skin_checked="1">
                                    <div class="fw-semibold" bis_skin_checked="1">📈 Legaktívabb vásárló</div>
                                    <div class="d-flex fw-bold" bis_skin_checked="1">
                                        <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>{{ $legaktivabbVasarlo }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Top 5 Vásárló card -->
                    <div class="col-lg-6 col-xxl-4 mb-4 mb-sm-5" bis_skin_checked="1">
                        <div class="card h-100">
                            <div class="card-body p-9">
                                <div class="fs-3 fw-bold mb-4">Top 5 Vásárló</div>
                                <div class="fs-5 fw-semibold text-gray-400 mb-6">Legtöbb vásárlással</div>
                    
                                @if($topVasarlok->isEmpty())
                                    <div class="fs-6 text-muted text-center">Nem történt még vásárlás.</div>
                                @else
                                    @foreach($topVasarlok as $vasarlo)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="fw-semibold fs-6">{{ $vasarlo['nev'] }}</span>
                                            <!-- Vásárlás badge jobbra igazítva -->
                                            <div class="ms-auto">
                                                <span class="badge badge-light-success fs-base">{{ $vasarlo['vasarlas_db'] }} vásárlás</span>
                                            </div>
                                        </div>
                                        <div class="separator separator-dashed" bis_skin_checked="1"></div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!--end::Stats-->
                <!--begin::Toolbar-->
                <div class="d-flex flex-wrap flex-stack my-5" bis_skin_checked="1">
                    <!--begin::Heading-->
                    <h2 class="fs-2 fw-semibold my-2">Felhasználók
                    <span class="fs-6 text-gray-400 ms-1">kezelése</span></h2>
                    <!--end::Heading-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Row-->
                <div class="row g-6 g-xl-9" bis_skin_checked="1">
                    <!--begin::Col-->
                    @if($users && count($users) > 0)
                        @foreach ($users as $user)
                        <div class="col-md-6 col-xl-4" bis_skin_checked="1">
                            <!--begin::Card-->
                            <a data-bs-toggle="modal" data-bs-target="#admin_felhasznalotorles" wire:click.prevent="keresdausert({{ $user->id }})" class="card border-hover-primary" style="cursor: pointer;">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-9" bis_skin_checked="1">
                                    <!--begin::Card Title-->
                                    <div class="card-title m-0" bis_skin_checked="1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px w-50px bg-light" bis_skin_checked="1">
                                            <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/4140/4140048.png') }}" alt="image" class="p-3">
                                        </div>
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::Car Title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar" bis_skin_checked="1">
                                        <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">{{ $user->id }}.</span>
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end:: Card header-->
                                <!--begin:: Card body-->
                                <div class="card-body p-9" bis_skin_checked="1">
                                    <!--begin::Name-->
                                    <div class="fs-3 fw-bold text-dark" bis_skin_checked="1">{{ $user->vezeteknev }} {{ $user->keresztnev }}</div>
                                    <!--end::Name-->
                                    <!--begin::Description-->
                                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ $user->email }}</p>
                                    <!--end::Description-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-5" bis_skin_checked="1">
                                        <!--begin::Due-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3" bis_skin_checked="1">
                                            <div class="fs-6 text-gray-800 fw-bold" bis_skin_checked="1">{{ $user->felhasznalonev }}</div>
                                            <div class="fw-semibold text-gray-400" bis_skin_checked="1">Felhasználónév</div>
                                        </div>
                                        <!--end::Due-->
                                        <!--begin::Budget-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3" bis_skin_checked="1">
                                            <div class="fs-6 text-gray-800 fw-bold" bis_skin_checked="1">{{ $user->created_at }}</div>
                                            <div class="fw-semibold text-gray-400" bis_skin_checked="1">Regisztráció</div>
                                        </div>
                                        <!--end::Budget-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end:: Card body-->
                            </a>
                            <!--end::Card-->
                        </div>
                        @endforeach
                        {{ $users->links() }}
                        @else 
                        <div class="card-body py-3 flex-center text-center p-10" bis_skin_checked="1">
                            <span class="text-muted fw-semibold text-muted d-block p-8 fs-7">Nincs Regisztrált felhasználó.</span>
                        </div>
                    @endif

                    <!--end::Col-->
                <!--begin::Modals-->
                <!--begin::Modal - View Users-->
                <script>
                    window.addEventListener('close-modal', event => {
                        $('#admin_felhasznalotorles').modal('hide');
                    });
                </script>
                <!--end::Modal - View Users-->
                <!--end::Modals-->
            </div>
            
            <div class="modal fade" id="admin_felhasznalotorles" wire:ignore.self tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-xl" bis_skin_checked="1">
                    <!--begin::Modal content-->
                    <div class="modal-content" bis_skin_checked="1">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end" bis_skin_checked="1">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" bis_skin_checked="1">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body pt-0 pb-15 px-20 px-xl-25" bis_skin_checked="1">
                            <!--begin::Heading-->
                            <div class="text-center mb-13" bis_skin_checked="1">
                                <!--begin::Title-->
                                <h1 class="mb-3">Felhasználó megtekintése</h1>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-muted fw-semibold fs-5" bis_skin_checked="1">Minden információt megtalálsz a profilról.</div>
                                <!--end::Description-->
                            </div>
                    <div class="mb-15">
                        <!--begin::List-->
                        <div class="mh-375px scroll-y me-n7 pe-7">
                            @if(count($userLogs) > 0) <!-- Ellenőrizzük, hogy van log -->
                                @foreach($userLogs as $log)
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!-- A felhasználó neve -->
                                            <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                {{ $log->user->vezeteknev }} {{ $log->user->keresztnev }}
                                            </a>
                                            <!-- Az email cím -->
                                            <div class="fw-semibold text-muted">{{ $log->user->email }}</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Action-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bold text-dark">{{ $log->action }}</div>
                                            <!-- A log részletei -->
                                            <div class="fs-7 text-muted">{{ $log->details }}</div>
                                            <!-- A log dátuma (pl. "3 napja") -->
                                            <div class="fs-7 text-muted">
                                                {{ $log->created_at_clock }}
                                            </div>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                @endforeach
                            @else
                                <div class="text-center">Nincsenek tevékenységek a kiválasztott felhasználóhoz.</div>
                            @endif
                        </div>
                        <!--end::List-->
                    </div>
                    
                    
                            
                            <!--end::Users-->
                            <!--begin::Notice-->
                            <div class="d-flex justify-content-between mb-3 py-5">
                                <!--begin::Label-->
                                <div class="fw-semibold">
                                    <label class="fs-6">Adminisztrátori jogosultság</label>
                                    <div class="fs-7 text-muted">Itt tudsz adni bárkinek admin jogkört.</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" wire:click="toggleAdminStatus({{ $selectedUserId }})" 
                                           @if($user && $user->admin == 1) checked @endif>
                                    <span class="form-check-label fw-semibold text-muted">
                                        @if($user && $user->admin == 1) Engedélyezve @else Letiltva @endif
                                    </span>
                                </label>
                                <!--end::Switch-->
                            </div>
                            
                            
                            
                            
                            <div class="d-flex justify-content-between mb-3" bis_skin_checked="1">
                                <!--begin::Label-->
                                <div class="fw-semibold" bis_skin_checked="1">
                                    <label class="fs-6">Felhasználó törlése</label>
                                    <div class="fs-7 text-muted" bis_skin_checked="1">Az itt látható gombra kattintva megteheted.</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <a href="#" wire:click.prevent="felhasznalotorles({{ $selectedUserId }})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"> <i class="ki-duotone ki-trash fs-2"> <span class="path1"></span> <span class="path2"></span> <span class="path3"></span> <span class="path4"></span> <span class="path5"></span> </i> </a>
                                <!--end::Switch-->
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

</div>