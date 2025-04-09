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
                        <li class="breadcrumb-item text-muted">Snack feltöltés</li>
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
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-md">
                <div class="row" bis_skin_checked="1">
                    <!--begin::Col-->
                    <div class="col-md-6" bis_skin_checked="1">
                        <!--begin::Card-->
                        <div class="card me-xl-3 mb-md-0 mb-6" bis_skin_checked="1">
                            <!--begin::Body-->
                            <div class="card-body card-md-stretch p-lg-17" bis_skin_checked="1">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-lg-row mb-17" bis_skin_checked="1">
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid me-0 me-lg-2" bis_skin_checked="1">
                                        <!--begin::Form-->
                                        <form action="m-0" class="form mb-4 fv-plugins-bootstrap5 fv-plugins-framework" method="post" wire:submit.prevent="Snackfeltoltes">
                                            <!--begin::Input group-->
                                            <div class="row mb-5" bis_skin_checked="1">
                                                <!--begin::Col-->
                                                <div class="d-flex flex-column mb-5 fv-row" bis_skin_checked="1">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-semibold mb-2">Snack neve</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder="" wire:model="nev">
                                                    <!--end::Input-->
                                                </div>
                                                <div class="row mb-5" bis_skin_checked="1">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-semibold mb-2">Snack ára</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid" wire:model="ar" placeholder="">
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
                                                        <input type="text" class="form-control form-control-solid flatpickr-input" placeholder="" wire:model="darabszam">
                                                        <!--end::Input-->
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                    <!--end::Col-->
                                                </div>
                                            <!--end::Input group-->

                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                    <span class="required">Snack Kategória</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip" aria-label="Your payment statements may very based on selected position" data-bs-original-title="Your payment statements may very based on selected position" data-kt-initialized="1">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <select name="category_id" wire:model="category_id" data-control="select" data-placeholder="Select a position..." class="form-select form-select-solid select-hidden-accessible" data-select-id="select-data-9-x5cb" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                    @if($categories && count($categories) > 0)
                                                        <option value="null" selected disabled>Kérlek válassz egy kategóriát</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->id }}. - {{ $category->nev }}</option>
                                                        @endforeach
                                                    @else
                                                        <option selected value="null" disabled>Nincs elérhető kategória.</option>
                                                    @endif
                                                </select>
                                                <!--end::Select-->
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-5 fv-row" bis_skin_checked="1">
                                                <!--begin::Label-->
                                                <label class="fs-5 fw-semibold mb-2">Snack kép</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" wire:model="kep" placeholder="" name="website">
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <!--end::Input group-->
                                            <!--begin::Input group-->

                                            <!--end::Input group-->
                                            <!--begin::Separator-->
                                            <div class="separator mb-8" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::Submit-->
                                            <button type="submit" class="btn btn-primary" id="kt_careers_submit_button" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);" wire:loading.attr="disabled">
                                                <span wire:loading.remove class="flex items-center justify-center">
                                                    <span class="flex items-center justify-center">
                                                        Feltöltés
                                                    </span>
                                                </span>
                                                <span wire:loading class="flex items-center justify-center">
                                                    <span class="flex items-center justify-center">
                                                        Feldolgozás...
                                                        <svg class="animate-spin h-5 w-5 ml-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </button>
                                            <!--end::Submit-->
                                        </form>
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
                    <!--end::Col-->
                </div>
           
            </div>
            <!--end::Content container-->
        </div>
           

        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <!--end::Footer-->
</div>

