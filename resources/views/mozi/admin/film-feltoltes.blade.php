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
                        <li class="breadcrumb-item text-muted">Film feltöltés</li>
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
                                    <div class="flex-lg-row-fluid me-0 me-lg-20" bis_skin_checked="1">
                                        <!--begin::Form-->
                                        <form action="m-0" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" wire:submit.prevent="filmfeltoltes">
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
                                                <div class="col-md-3 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-semibold mb-2">Kiadás éve</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" placeholder="" wire:model="filmev" oninput="updateTextPreview()"  id="textfilmev" name="first_name">
                                                    <!--end::Input-->
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
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
                                                    <input type="text" class="form-control form-control-solid flatpickr-input" placeholder="" wire:model="idotartam" oninput="updateTextPreview()" id="textfilmvetitesiidotartam"  name="start_date">
                                                    <!--end::Input-->
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback" bis_skin_checked="1"></div></div>
                                                <!--end::Col-->
                                            </div>
                                            <div class="row mb-5" bis_skin_checked="1">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-semibold mb-2">Időpont (pl. 12:45)</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"  wire:model="vetitesidopont" placeholder="" name="salary">
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
                                                    <input type="text" class="form-control form-control-solid flatpickr-input" wire:model="darabszam" oninput="updateTextPreview()" id="textfilmdarabszam"  placeholder=""  name="start_date">
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
                    <div class="col-md-6" bis_skin_checked="1">
                        <div class="card card-md-stretch me-xl-3 mb-md-0 mb-6" bis_skin_checked="1">
                            <div class="card-body py-9" bis_skin_checked="1">
                                <div class="row gx-9 h-100" bis_skin_checked="1">
                                    <div class="col-sm-6 mb-10 mb-sm-0" bis_skin_checked="1">
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100" id="imagePreview" bis_skin_checked="1">
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
                                                            <img id="ageRatingPreview" class="" alt="kiskép">
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
                                                    <!--[if BLOCK]><![endif]-->                                                        <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);" data-bs-target="#kt_modal_upgrade_plan2">Lefoglalás</a>
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
           
            </div>
            <!--end::Content container-->
        </div>
           

        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <!--end::Footer-->
</div>

<script>
    // A placeholder kép URL-je
    const defaultFilmNeve = "Alapértelmezett film címe";
    const defaultFilmAra = "2000";
    const placeholderImage = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_cw8H6KpFUOiEaZFJWxVSWr77Mylr-KnMAw&s';

    // Kép előnézet frissítése hibakezeléssel
    function updateImagePreview() {
      const imageUrl = document.getElementById('imageUrl').value;
      const ageRatingUrl = document.getElementById('ageRatingUrl').value;
      const imgElement = document.getElementById('imagePreview');
      const ageImgElement = document.getElementById('ageRatingPreview');

      imgElement.style.backgroundImage = imageUrl.trim() !== '' ? `url('${imageUrl}')` : `url('${placeholderImage}')`;
      imgElement.onerror = function() {
      this.onerror = null;
      this.src = placeholderImage;
    };

    // Korhatár kép frissítése
    ageImgElement.src = ageRatingUrl.trim() !== '' ? ageRatingUrl : placeholderImage;
    ageImgElement.onerror = function() {
      this.onerror = null;
      this.src = placeholderImage;
        };
    }

    // Szöveg előnézet frissítése
    function updateTextPreview() {
      const textfilmneve = document.getElementById('textfilmneve').value;
      const textfilmnevePreview = document.getElementById('textfilmnevePreview');
      textfilmnevePreview.innerText = textfilmneve;

      const textjegyara = document.getElementById('textjegyara').value;
      const textjegyaraPreview = document.getElementById('textjegyaraPreview');
      textjegyaraPreview.innerText = textjegyara + ' Ft';

      const textfilmleiras = document.getElementById('textfilmleiras').value;
      const textfilmleirasPreview = document.getElementById('textfilmleirasPreview');
      textfilmleirasPreview.innerText = textfilmleiras;

      const textfilmvetitesidatum = document.getElementById('textfilmvetitesidatum').value;
      const textfilmvetitesidatumPreview = document.getElementById('textfilmvetitesidatumPreview');
      textfilmvetitesidatumPreview.innerText = textfilmvetitesidatum;

      const textfilmvetitesiidotartam = document.getElementById('textfilmvetitesiidotartam').value;
      const textfilmvetitesiidotartamPreview = document.getElementById('textfilmvetitesiidotartamPreview');
      textfilmvetitesiidotartamPreview.innerText = textfilmvetitesiidotartam;

      const textfilmdarabszam = document.getElementById('textfilmdarabszam').value;
      const textfilmdarabszamPreview = document.getElementById('textfilmdarabszamPreview');
      textfilmdarabszamPreview.innerText = textfilmdarabszam + ' darab';

      const textfilmev = document.getElementById('textfilmev').value;
      const textfilmevPreview = document.getElementById('textfilmevPreview');
      textfilmevPreview.innerText = 'Kiadás éve - ' + textfilmev;
    }

    window.onload = function() {
            updateImagePreview();
        };
  </script>