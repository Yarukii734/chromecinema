<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Kezelőfelület</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('mozi.fooldal') }}" class="text-muted text-hover-primary">Adminisztráció</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Felhívás feltöltés</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-md">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card me-xl-3 mb-md-0 mb-6">
                            <div class="card-body card-md-stretch p-lg-17">
                                <div class="d-flex flex-column flex-lg-row mb-17">
                                    <div class="flex-lg-row-fluid me-0 me-lg-2">
                                        <!--begin::Form-->
                                        <form action="m-0" class="form mb-4 fv-plugins-bootstrap5 fv-plugins-framework" method="post" wire:submit.prevent="felhivasFeltoltes">
                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <label class="required fs-5 fw-semibold mb-2">Felhívás címe</label>
                                                    <input class="form-control form-control-solid" wire:model="title" placeholder="Írd be a felhívás címét">
                                                    
                                                </div>
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <label class="required fs-5 fw-semibold mb-2">Létrehozta</label>
                                                    <input type="text" class="form-control form-control-solid" wire:model="createdby" placeholder="Hagyhatod üresen is.">
                                                </div>
                                            </div>

                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <div class="d-flex flex-column mb-5 fv-row">
                                                    <label class="required fs-5 fw-semibold mb-2">Leírás</label>
                                                    <textarea class="form-control form-control-solid" wire:model="content" placeholder="Írd be a felhívás leírását"></textarea>
                                                </div>

                                            
                                            </div>
                                            <!--end::Input group-->
                                            
                                            <!--begin::Input group-->
                                            <!--end::Input group-->

                                            <div class="separator mb-8"></div>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
