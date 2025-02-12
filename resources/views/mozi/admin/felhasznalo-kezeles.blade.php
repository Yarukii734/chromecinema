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
                    <div class="col-lg-6 col-xxl-4" bis_skin_checked="1">
                        <!--begin::Card-->
                        <div class="card h-100" bis_skin_checked="1">
                            <!--begin::Card body-->
                            <div class="card-body p-9" bis_skin_checked="1">
                                <!--begin::Heading-->
                                <div class="fs-2hx fw-bold" bis_skin_checked="1">{{ $userCount }}</div>
                                <div class="fs-4 fw-semibold text-gray-400 mb-7" bis_skin_checked="1">Regisztrált felhasználó</div>
                                <!--end::Heading-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-wrap" bis_skin_checked="1">
                                    <!--begin::Chart-->

                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-lg-6 col-xxl-4" bis_skin_checked="1">
                        <!--begin::Budget-->
                        <div class="card h-100" bis_skin_checked="1">
                            <div class="card-body p-9" bis_skin_checked="1">
                                <div class="fs-2hx fw-bold" bis_skin_checked="1">$3,290.00</div>
                                <div class="fs-4 fw-semibold text-gray-400 mb-7" bis_skin_checked="1">Valami faszság</div>
                                <div class="fs-6 d-flex justify-content-between mb-4" bis_skin_checked="1">
                                    <div class="fw-semibold" bis_skin_checked="1">Avg. Project Budget</div>
                                    <div class="d-flex fw-bold" bis_skin_checked="1">
                                    <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>$6,570</div>
                                </div>
                                <div class="separator separator-dashed" bis_skin_checked="1"></div>
                                <div class="fs-6 d-flex justify-content-between my-4" bis_skin_checked="1">
                                    <div class="fw-semibold" bis_skin_checked="1">Lowest Project Check</div>
                                    <div class="d-flex fw-bold" bis_skin_checked="1">
                                    <i class="ki-duotone ki-arrow-down-left fs-3 me-1 text-danger">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>$408</div>
                                </div>
                                <div class="separator separator-dashed" bis_skin_checked="1"></div>
                                <div class="fs-6 d-flex justify-content-between mt-4" bis_skin_checked="1">
                                    <div class="fw-semibold" bis_skin_checked="1">Ambassador Page</div>
                                    <div class="d-flex fw-bold" bis_skin_checked="1">
                                    <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>$920</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Budget-->
                    </div>
                    <div class="col-lg-6 col-xxl-4" bis_skin_checked="1">
                        <!--begin::Clients-->
                        <div class="card h-100" bis_skin_checked="1">
                            <div class="card-body p-9" bis_skin_checked="1">
                                <!--begin::Heading-->
                                <div class="fs-2hx fw-bold" bis_skin_checked="1">49</div>
                                <div class="fs-4 fw-semibold text-gray-400 mb-7" bis_skin_checked="1">Nemtudom mi</div>
                                <!--end::Heading-->
                                <!--begin::Users group-->
                                <div class="symbol-group symbol-hover mb-9" bis_skin_checked="1">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Alan Warden" data-kt-initialized="1" bis_skin_checked="1">
                                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon" data-bs-original-title="Michael Eberon" data-kt-initialized="1" bis_skin_checked="1">
                                        <img alt="Pic" src="assets/media/avatars/300-11.jpg">
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston" data-kt-initialized="1" bis_skin_checked="1">
                                        <img alt="Pic" src="assets/media/avatars/300-7.jpg">
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Francis Mitcham" data-bs-original-title="Francis Mitcham" data-kt-initialized="1" bis_skin_checked="1">
                                        <img alt="Pic" src="assets/media/avatars/300-20.jpg">
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1" bis_skin_checked="1">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1" bis_skin_checked="1">
                                        <img alt="Pic" src="assets/media/avatars/300-2.jpg">
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Perry Matthew" data-kt-initialized="1" bis_skin_checked="1">
                                        <span class="symbol-label bg-info text-inverse-info fw-bold">P</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Barry Walter" data-bs-original-title="Barry Walter" data-kt-initialized="1" bis_skin_checked="1">
                                        <img alt="Pic" src="assets/media/avatars/300-12.jpg">
                                    </div>
                                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+42</span>
                                    </a>
                                </div>
                                <!--end::Users group-->
                                <!--begin::Actions-->
                                <div class="d-flex" bis_skin_checked="1">
                                    <a href="#" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">All Clients</a>
                                    <a href="#" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Invite New</a>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </div>
                        <!--end::Clients-->
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
                            <a data-bs-toggle="modal" data-bs-target="#admin_felhasznalotorles" class="card border-hover-primary" style="cursor: pointer;">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-9" bis_skin_checked="1">
                                    <!--begin::Card Title-->
                                    <div class="card-title m-0" bis_skin_checked="1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px w-50px bg-light" bis_skin_checked="1">
                                            <img src="{{ asset('assets/assets/media/avatars/300-3.jpg') }}" alt="image" class="p-3">
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
                                    <h1 class="mb-3">Browse Users</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-muted fw-semibold fs-5" bis_skin_checked="1">If you need more info, please check out our
                                    <a href="#" class="link-primary fw-bold">Users Directory</a>.</div>
                                    <!--end::Description-->
                                </div>
                                <div class="row mt-10 mb-7" bis_skin_checked="1">
                            <!--begin::Col-->
                            <div class="col-md-6" bis_skin_checked="1">
                                <!--begin::Card-->
                                <div class="card me-xl-3 mb-md-0 mb-6" bis_skin_checked="1">
                                    <!--begin::Body-->
                                    <div class="card-body card-md-stretch p-lg-17" bis_skin_checked="1">
                                        <!--begin::Layout-->
                                        <div class="d-flex flex-column flex-lg-row mb-17" bis_skin_checked="1">
                                            <!--begin::Content-->
                                            <div class="flex-lg-row-fluid me-0 me-lg-25" bis_skin_checked="1">
                                                <!--begin::Form-->
                                            
                                                    <!--begin::Input group-->
                                                    <div class="row mb-5" bis_skin_checked="1">
                                                        <!--begin::Col-->
                                                        <div class="d-flex flex-column mb-5 fv-row" bis_skin_checked="1">
                                                            <!--begin::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Film neve</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input class="form-control form-control-solid" placeholder="" wire:model="filmnev" oninput="updateTextPreview()" id="textfilmneve" name="website">
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-md-3 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--begin::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Jegy Ára</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model="jegyar" oninput="updateTextPreview()" id="textjegyara" name="first_name">
                                                            <!--end::Input-->
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                        <div class="col-md-4 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--begin::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Kiadás éve</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model="filmev" oninput="updateTextPreview()" id="textfilmev" name="first_name">
                                                            <!--end::Input-->
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-md-5 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--end::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Korhatár</label>
                                                            <!--end::Label-->
                                                            <!--end::Input-->
                                                            <input type="text" class="form-control form-control-solid" wire:model="korhatar" oninput="updateImagePreview()" id="ageRatingUrl" placeholder="" name="last_name">
                                                            <!--end::Input-->
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
        
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-5" bis_skin_checked="1">
                                                        <label class="fs-6 fw-semibold mb-2">Film leírás</label>
                                                        <textarea class="form-control form-control-solid" rows="2" wire:model="filmleiras" name="experience" oninput="updateTextPreview()" id="textfilmleiras" placeholder=""></textarea>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                            <span class="required">Film Kategória</span>
                                                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Your payment statements may very based on selected position" data-bs-original-title="Your payment statements may very based on selected position" data-kt-initialized="1">
                                                                <i class="ki-duotone ki-information fs-7">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select name="position" wire:model="categoryid" data-control="select" data-placeholder="Select a position..." class="form-select form-select-solid select-hidden-accessible" data-select-id="select-data-9-x5cb" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                            <!--[if BLOCK]><![endif]-->                                                                <option value="null" selected="" disabled="">Kérlek válassz egy kategóriát</option>
                                                                <!--[if BLOCK]><![endif]-->                                                                    <option value="1">1. - Akció</option>
                                                                                                                                    <option value="2">2. - Dráma</option>
                                                                                                                                    <option value="3">3. - Vígjáték</option>
                                                                                                                                    <option value="4">4. - Sci-fi</option>
                                                                                                                                    <option value="5">5. - Mese</option>
                                                                                                                                    <option value="6">6. - Romantikus</option>
                                                                <!--[if ENDBLOCK]><![endif]-->
                                                            <!--[if ENDBLOCK]><![endif]-->
                                                        </select>
                                                        <!--end::Select-->
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="row mb-5" bis_skin_checked="1">
                                                        <!--begin::Col-->
                                                        <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--begin::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Vetítés dátum</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" wire:model="vetitesidatum" placeholder="" oninput="updateTextPreview()" id="textfilmvetitesidatum" name="salary">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1">
        
                                                            </div>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--end::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Vetítés időtartam</label>
                                                            <!--end::Label-->
                                                            <!--end::Input-->
                                                            <input type="text" class="form-control form-control-solid flatpickr-input" placeholder="" wire:model="idotartam" oninput="updateTextPreview()" id="textfilmvetitesiidotartam" name="start_date">
                                                            <!--end::Input-->
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <div class="row mb-5" bis_skin_checked="1">
                                                        <!--begin::Col-->
                                                        <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--begin::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Időpont</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" wire:model="vetitesidopont" placeholder="" name="salary">
                                                            <!--end::Input-->
                                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1">
                                                                
                                                            </div>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                            <!--end::Label-->
                                                            <label class="required fs-5 fw-semibold mb-2">Darabszám</label>
                                                            <!--end::Label-->
                                                            <!--end::Input-->
                                                            <input type="text" class="form-control form-control-solid flatpickr-input" wire:model="darabszam" oninput="updateTextPreview()" id="textfilmdarabszam" placeholder="" name="start_date">
                                                            <!--end::Input-->
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-5 fv-row" bis_skin_checked="1">
                                                        <!--begin::Label-->
                                                        <label class="fs-5 fw-semibold mb-2">Film kép</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input class="form-control form-control-solid" wire:model="filmkep" oninput="updateImagePreview()" id="imageUrl" placeholder="" name="website">
                                                        <!--end::Input-->
                                                    </div>

                                                <!--end::Form-->
                                                <!--begin::Job-->
                                                
                                                <!--end::Job-->
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Sidebar-->
                                            
                                            <!--end::Sidebar-->
                                        </div>
                                        <!--end::Layout-->
                                        <!--begin::Section-->
                                        
                                        <!--end::Section-->
                                        <!--begin::Card-->
                                        
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6" bis_skin_checked="1">
                                <div class="card card-md-stretch me-xl-3 mb-md-0 mb-6" bis_skin_checked="1">
                                    <div class="card-body py-9" bis_skin_checked="1">
                                        <div class="row gx-9 h-100" bis_skin_checked="1">
                                            <div class="col-sm-6 mb-10 mb-sm-0" bis_skin_checked="1">
                                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100" id="imagePreview" bis_skin_checked="1" style="background-image: url(&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_cw8H6KpFUOiEaZFJWxVSWr77Mylr-KnMAw&amp;s&quot;);">
                                                </div>
                                            </div>
                                            <div class="col-sm-6" bis_skin_checked="1">
                                                <div class="d-flex flex-column h-100" bis_skin_checked="1">
                                                    <div class="mb-7" bis_skin_checked="1">
                                                        <div class="d-flex flex-stack mb-6" bis_skin_checked="1">
                                                            <div class="flex-shrink-0 me-5" bis_skin_checked="1">
                                                                <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1" id="textfilmevPreview">Kiadás éve -</span>
                                                                <span class="text-gray-800 fs-3 fw-bold" id="textfilmnevePreview">Film cím</span>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center flex-wrap d-grid gap-2" bis_skin_checked="1">
                                                            <div class="d-flex align-items-center me-5 me-xl-13" bis_skin_checked="1">
                                                                <div class="symbol symbol-30px symbol-circle me-3" bis_skin_checked="1">
                                                                    <img id="ageRatingPreview" class="" alt="kiskép" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_cw8H6KpFUOiEaZFJWxVSWr77Mylr-KnMAw&amp;s">
                                                                </div>
                                                                <div class="m-0" bis_skin_checked="1">
                                                                    <span class="fw-semibold text-gray-400 d-block fs-8">Ajánlott</span>
                                                                    <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-7">Korhatár</a>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="symbol symbol-30px symbol-circle me-3" bis_skin_checked="1">
                                                                    <span class="symbol-label bg-success">
                                                                        <i class="ki-duotone ki-abstract-41 fs-5 text-white">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </span>
                                                                </div>
                                                                <div class="m-0" bis_skin_checked="1">
                                                                    <span class="fw-semibold text-gray-400 d-block fs-8">Jegy ár</span>
                                                                    <span class="fw-bold text-gray-800 fs-7" id="textjegyaraPreview">1500 Ft</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-6" bis_skin_checked="1">
                                                        <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                                                            <p id="textfilmleirasPreview">Ide jön a leírás.</p>
                                                        </span>
                                                        <div class="d-flex" bis_skin_checked="1">
                                                            <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3" bis_skin_checked="1">
                                                                <span class="fs-6 text-gray-700 fw-bold" id="textfilmvetitesidatumPreview">2025.02.05</span>
                                                                <div class="fw-semibold text-gray-400" bis_skin_checked="1">Vetítés időpont</div>
                                                            </div>
                                                            <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3" bis_skin_checked="1">
                                                                <span class="fs-6 text-gray-700 fw-bold" id="textfilmvetitesiidotartamPreview">2 óra 15 perc</span>
                                                                <div class="fw-semibold text-gray-400" bis_skin_checked="1">Időtartam</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-stack mt-auto bd-highlight" bis_skin_checked="1">
                                                        <div class="symbol-group symbol-hover flex-nowrap" bis_skin_checked="1">
                                                            <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7" id="textfilmdarabszamPreview">10 darab</span>
                                                        </div>
                                                        <div class="text-center mt-5 mb-9" bis_skin_checked="1">
                                                            <!--[if BLOCK]><![endif]-->                                                        <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan2">Lefoglalás</a>
                                                            <!--[if ENDBLOCK]><![endif]-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                                <div class="mb-15" bis_skin_checked="1">
                                    <!--begin::List-->
                                    <div class="mh-375px scroll-y me-n7 pe-7" bis_skin_checked="1">
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-6.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Emma Smith
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Art Director</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">smith@kpmg.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$23,000</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Melody Macy
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Marketing Analytic</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">melody@altbox.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$50,500</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Max Smith
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Software Enginer</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">max@kt.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$75,900</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-5.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Sean Bean
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Web Developer</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">sean@dellito.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$10,500</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-25.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Brian Cox
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">UI/UX Designer</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">brian@exchange.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$20,000</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Mikaela Collins
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Head Of Marketing</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">mik@pex.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$9,300</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-9.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Francis Mitcham
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Software Arcitect</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">f.mit@kpmg.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$15,000</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Olivia Wild
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">System Admin</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">olivia@corpmail.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$23,000</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Neil Owen
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Account Manager</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">owen.neil@gmail.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$45,800</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-23.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Dan Wilson
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Web Desinger</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">dam@consilting.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$90,500</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Emma Bold
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Corporate Finance</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">emma@intenso.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$5,000</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <img alt="Pic" src="assets/media/avatars/300-12.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Ana Crown
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Customer Relationship</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">ana.cf@limtel.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$70,000</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="d-flex flex-stack py-5" bis_skin_checked="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-info text-info fw-semibold">A</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-6" bis_skin_checked="1">
                                                    <!--begin::Name-->
                                                    <a href="#" class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">Robert Doe
                                                    <span class="badge badge-light fs-8 fw-semibold ms-2">Marketing Executive</span></a>
                                                    <!--end::Name-->
                                                    <!--begin::Email-->
                                                    <div class="fw-semibold text-muted" bis_skin_checked="1">robert@benko.com</div>
                                                    <!--end::Email-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Stats-->
                                            <div class="d-flex" bis_skin_checked="1">
                                                <!--begin::Sales-->
                                                <div class="text-end" bis_skin_checked="1">
                                                    <div class="fs-5 fw-bold text-dark" bis_skin_checked="1">$45,500</div>
                                                    <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                                </div>
                                                <!--end::Sales-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::List-->
                                </div>
                                
                                
                                <!--end::Users-->
                                <!--begin::Notice-->
                                <div class="d-flex justify-content-between mb-3 py-5" bis_skin_checked="1">
                                    <!--begin::Label-->
                                    <div class="fw-semibold" bis_skin_checked="1">
                                        <label class="fs-6">Adminisztrátori jogosultság</label>
                                        <div class="fs-7 text-muted" bis_skin_checked="1">Itt tudsz adni bárkinek admin jogkört.</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" checked="checked">
                                        <span class="form-check-label fw-semibold text-muted">Engedélyezve</span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <div class="d-flex justify-content-between mb-3" bis_skin_checked="1">
                                    <!--begin::Label-->
                                    <div class="fw-semibold" bis_skin_checked="1">
                                        <label class="fs-6">Felhasználó törlése {{ $user->id }}</label>
                                        <div class="fs-7 text-muted" bis_skin_checked="1">Az itt látható gombra kattintva megteheted.</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <a href="#" wire:click.prevent="felhasznalotorles({{ $user->id }})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"> <i class="ki-duotone ki-trash fs-2"> <span class="path1"></span> <span class="path2"></span> <span class="path3"></span> <span class="path4"></span> <span class="path5"></span> </i> </a>
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
                <!--end::Modal - View Users-->
                <!--end::Modals-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

</div>