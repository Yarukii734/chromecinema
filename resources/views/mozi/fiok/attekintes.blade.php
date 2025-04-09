<div class="tab-pane fade show active" id="attekintes" role="tabpanel" aria-labelledby="attekintes-line-tab" wire:ignore.self>
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view" bis_skin_checked="1">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer" bis_skin_checked="1">
            <!--begin::Card title-->
            <div class="card-title m-0" bis_skin_checked="1">
                <h3 class="fw-bold m-0">Fiók részletek</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9" bis_skin_checked="1">
            <!--begin::Row-->
            <div class="row mb-7" bis_skin_checked="1">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Teljes neved</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8" bis_skin_checked="1">
                    <span class="fw-bold fs-6 text-gray-800">{{ $user->vezeteknev }} {{ $user->keresztnev }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-7" bis_skin_checked="1">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Felhasználó neved</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row" bis_skin_checked="1">
                    <span class="fw-semibold text-gray-800 fs-6">{{ $user->felhasznalonev }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-7" bis_skin_checked="1">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Email címed</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8" bis_skin_checked="1">
                    <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $user->email }}</a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Notice-->
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6" bis_skin_checked="1">
                <!--begin::Icon-->
                <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1" bis_skin_checked="1">
                    <!--begin::Content-->
                    <div class="fw-semibold" bis_skin_checked="1">
                        <h4 class="text-gray-900 fw-bold">Kérjük vedd figyelembe!</h4>
                        <div class="fs-6 text-gray-700" bis_skin_checked="1">Ügyelj az adataid helyességére, amennyiben kitalált dolgokkal töltöd ki, fiókodat felfüggeszthetjük! Kattints a 
                        <a class="fw-bold" href="{{ route('mozi.fiok') }}">beállításokhoz</a>.</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Card body-->
    </div>
</div>
