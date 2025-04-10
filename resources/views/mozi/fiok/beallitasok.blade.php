<div class="tab-pane fade" id="beallitasok" role="tabpanel" aria-labelledby="beallitasok-line-tab" wire:ignore.self>
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Fiók részletek</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form class="form" wire:submit.prevent="mentes" enctype="multipart/form-data">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--Profilkep
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Profilkép</label>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('default-avatar.jpg') }}')">
                                
                                <div class="image-input-wrapper w-125px h-125px" 
                                    style="background-image: url('{{ asset('default-avatar.jpg') }}')">
                                </div>
                    
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" 
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-7"></i>
                                    <input type="file" wire:model="profilkep" accept=".png, .jpg, .jpeg">

                                </label>
                    
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" 
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2"></i>
                                </span>
                    
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" 
                                    data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-duotone ki-cross fs-2"></i>
                                </span>
                            </div>
                    
                            <div class="form-text">Elfogadott képtípusok: png, jpg, jpeg.</div>
                        </div>
                    </div>-->
                    
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Teljes név</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Vezetéknév" wire:model="vezeteknev"/>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Keresztnév" wire:model="keresztnev"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Felhasználónév</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Felhasználónév" wire:model="felhasznalonev"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Email cím</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Email cím" wire:model="email" disabled/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Mégse</button>
                    <button type="submit" class="btn btn-primary"
                style="border-radius: 4px; background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);"
                wire:click="mentes"
                wire:loading.attr="disabled"
                wire:loading.target="mentes"
        >
            <!-- Normál állapot -->
            <span wire:loading.remove wire:target="mentes">Mentés változtatása</span>

            <!-- Betöltés állapot -->
            <span wire:loading wire:target="mentes">Feldolgozás...</span>

            <!-- Spinner -->
            <span wire:loading wire:target="mentes" class="ml-2">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
            </span>
        </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
</div>