<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Kezelőfelület</h1>
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
                <div class="alert alert-info alert-warning fade show" role="alert" wire:offline>
                    <strong>Kapcsolati probléma!</strong> Úgy tűnik, hogy az internetkapcsolat megszakadt. Az adatok
                    frissítése valószínűleg nem fog megfelelően működni. Kérjük, ellenőrizd a kapcsolatot.
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-md">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    @if ($movies && count($movies) > 0)
                        @foreach ($movies as $movie)
                            <div class="col-xxl-6">
                                <div class="card card-flush h-md-100">
                                    <div class="card-body py-9">
                                        <div class="row gx-9 h-100">
                                            <div class="col-sm-6 mb-10 mb-sm-0">
                                                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                                                    style="background-size: 100% 100%;background-image:url('{{ $movie->filmkep }}')">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex flex-column h-100">
                                                    <div class="mb-7">
                                                        <div class="d-flex flex-stack mb-6">
                                                            <div class="flex-shrink-0 me-5">
                                                                <span
                                                                    class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">Kiadás
                                                                    éve - {{ $movie->film_ev ?? 'N/A' }}</span>
                                                                <span
                                                                    class="text-gray-800 fs-3 fw-bold">{{ $movie->filmnev }}</span>

                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                            <div class="d-flex align-items-center me-5 me-xl-13">
                                                                <div class="symbol symbol-30px symbol-circle me-3">
                                                                    <img src="{{ $movie->korhatar }}" class=""
                                                                        alt="kiskép" />
                                                                </div>
                                                                <div class="m-0">
                                                                    <span class="fw-semibold text-gray-400 d-block fs-8">Ajánlott</span>
                                                                    <a href="#"
                                                                        class="fw-bold text-gray-800 text-hover-primary fs-7">Korhatár</a>
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
                                                                    <span class="fw-semibold text-gray-400 d-block fs-8">Jegy
                                                                        ár</span>
                                                                    <span
                                                                        class="fw-bold text-gray-800 fs-7">{{ number_format($movie->jegyar, 0, ',', '.') }}
                                                                        Ft</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-6">
                                                        <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                                                            <p>{{ $movie->filmleiras }}</p>

                                                        </span>
                                                        <div class="d-flex">
                                                            <div
                                                                class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                                <span
                                                                    class="fs-6 text-gray-700 fw-bold">{{ $movie->vetitesidatum }}</span>
                                                                <div class="fw-semibold text-gray-400">Vetítés időpont</div>
                                                            </div>
                                                            <div
                                                                class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                                <span class="fs-6 text-gray-700 fw-bold">{{ $movie->idotartam }}</span>
                                                                <div class="fw-semibold text-gray-400">Időtartam</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-stack mt-auto bd-highlight">
                                                        <div class="symbol-group symbol-hover flex-nowrap">
                                                            <span
                                                                class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $movie->darabszam }}
                                                                darab</span>
                                                        </div>
                                                        <div class="text-center mt-5 mb-9">
                                                            @if($this->isBookingAvailable($movie))
                                                                <button type="button" style="
                                                            -webkit-border-radius: 4px;
                                                            -moz-border-radius: 4px;
                                                            border-radius: 4px;
                                                            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);
                                                        " class="btn btn-sm btn-primary px-6 relative"
                                                           wire:click="openSeatSelectionModal({{ $movie->id }})"
                                                           wire:loading.attr="disabled"
                                                           wire:target="openSeatSelectionModal({{ $movie->id }})">

                                                                    <span wire:loading.remove wire:target="openSeatSelectionModal({{ $movie->id }})">Lefoglalás</span>
                                                    
                                                                    <!-- Betöltés állapot -->
                                                                    <span wire:loading wire:target="openSeatSelectionModal({{ $movie->id }})" class="flex items-center justify-center">
                                                                        <span>Feldolgozás...</span>
                                                                        <svg class="animate-spin h-5 w-5 ml-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button type="button" style="
                                                            -webkit-border-radius: 4px;
                                                            -moz-border-radius: 4px;
                                                            border-radius: 4px;
                                                            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);
                                                        " class="btn btn-sm btn-primary px-6" disabled>
                                                                    Nem foglalható
                                                                </button>
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
                                    <div class="fw-semibold fs-6 text-gray-500 mb-7" bis_skin_checked="1">A(z)
                                        <b>{{ $category->nev }}</b> kategóriában tartalom nem található.
                                        <p>Ne aggódj! Már dolgozunk a hiba javításán!</p>
                                    </div>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <img src="{{ asset('assets/assets/media/auth/404-error.png') }}"
                                            class="mw-100 mh-300px theme-light-show" alt="">
                                        <img src="{{ asset('assets/assets/media/auth/404-error-dark.png') }}"
                                            class="mw-100 mh-300px theme-dark-show" alt="">
                                    </div>
                                    <div class="mb-0" bis_skin_checked="1">
                                        <a href="{{ route('mozi.fooldal') }}" class="btn btn-sm btn-primary"
                                            bis_skin_checked="1">Vissza a főoldalra.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($isModalOpen && $selectedMovie)
    <div
     class="modal fade show"
     tabindex="-1"
     bis_skin_checked="1"
     aria-modal="true"
     role="dialog"
     style="display: block; padding-left: 0px;"
    >
     <!--begin::Modal dialog-->
     <div class="modal-dialog modal-xl" bis_skin_checked="1">
      <!--begin::Modal content-->
      <div class="modal-content rounded" bis_skin_checked="1">
       <!--begin::Modal header-->
       <div
        class="modal-header justify-content-end border-0 pb-0"
        bis_skin_checked="1"
       >
        <!--begin::Close-->
        <div
         class="btn btn-sm btn-icon btn-active-color-primary"
         data-bs-dismiss="modal"
         wire:click="closeSeatSelectionModal"
         bis_skin_checked="1"
        >
         <i class="ki-duotone ki-cross fs-1">
          <span class="path1"></span>
          <span class="path2"></span>
         </i>
        </div>
        <!--end::Close-->
       </div>
       <!--end::Modal header-->
       <!--begin::Modal body-->
       <div class="modal-body pt-0 pb-15 px-5 px-xl-25" bis_skin_checked="1">
        <!--begin::Heading-->
		<div class="mb-2 text-center" bis_skin_checked="1">
			<h1 class="mb-3">Székfoglalás</h1>
			<div class="text-muted fw-semibold fs-5" bis_skin_checked="1">
			 Válassza ki a(z) {{ $selectedMovie->filmnev }} filmhez kívánt székeket.
			</div>
		   </div>
        <!--end::Heading-->
  
        <!--begin::Seat counts-->
        @php
         $seatCounts = $this->getSeatCounts();
        @endphp
        <div class="mb-2 text-center" bis_skin_checked="1">
         <div class="text-muted fw-semibold fs-5" bis_skin_checked="1">
          Lefoglalt székek: {{ $seatCounts['occupied'] }}
         </div>
         <div class="text-muted fw-semibold fs-5" bis_skin_checked="1">
          Szabad székek: {{ $seatCounts['free'] }}
         </div>
        </div>
        <!--end::Seat counts-->
  
        <!--begin::Color guide-->
        <div class="mb-5 text-center" bis_skin_checked="1">
            <div class="d-flex justify-content-center align-items-center szinsegitseg">
             <span class="free"></span>Szabad &nbsp;
             <span class="busy"></span>Foglalt &nbsp;
             <span class="selected"></span>Kiválasztott
            </div>
           </div>
        <!--end::Color guide-->
  
        <!--begin::Székek-->
             <!--begin::Székek elrendezése-->
              @if (is_array($selectedMovie->seats) && count($selectedMovie->seats) > 0)
               @foreach ($selectedMovie->seats as $row => $seatsInRow)
                <div class="seat-row">
                 <span class="row-label">Sor {{ $row + 1 }}:</span>
                 <div class="seats-container">
                  @foreach ($seatsInRow as $seat => $status)
                   <button
                    wire:click="selectSeat({{ $row }}, {{ $seat }})"
                    class="seat {{ $status }} @if($this->isSeatSelected($row, $seat)) selected @endif"
                    @if ($status === 'foglalt') disabled @endif
                   ></button>
                  @endforeach
                 </div>
                </div>
               @endforeach
               <div class="column-labels">
                <div class="seats-container">
                 @foreach (range(1, count($selectedMovie->seats[0] ?? [])) as $column)
                  <span class="column-label">{{ $column }}</span>
                 @endforeach
                </div>
               </div>
              @else
               <p>Nincsenek székek inicializálva.</p>
              @endif
             <!--end::Székek elrendezése-->
        <!--end::Székek-->
  
        <!--begin::Actions-->
        <div class="d-flex flex-center flex-row-fluid pt-12" bis_skin_checked="1">
         <button
          type="reset"
          class="btn btn-light me-3"
          data-bs-dismiss="modal"
          wire:click="closeSeatSelectionModal"
         >
          Kilépés
         </button>
         <button
          type="button"
          class="btn btn-primary"
          style="
           -webkit-border-radius: 4px;
           -moz-border-radius: 4px;
           border-radius: 4px;
           background: linear-gradient(
            90deg,
            rgba(2, 0, 36, 1) 0%,
            rgb(79 153 183) 0%,
            rgb(16 197 132) 100%
           );
          "
          wire:click="addToCart"
          @if (empty($selectedSeats[$selectedMovie->id])) disabled @endif
         >
          Kosárba
         </button>
        </div>
        <!--end::Actions-->
       </div>
       <!--end::Modal body-->
      </div>
      <!--end::Modal content-->
     </div>
     <!--end::Modal dialog-->
    </div>
    <div class="modal-backdrop fade show"></div>
   @endif
  
   <style>
    /* Alap szék stílusok */
    .seat {
      width: 40px;
      height: 40px;
      border: 1px solid #020202;
      margin: 4px;
      text-align: center;
      line-height: 35px;
      cursor: pointer;
      border-radius: 5px;
      font-size: 0.65em;
    }
  
    /* Foglalt szék stílusa */
    .seat.foglalt {
      background-color: #a91313;
      color: white;
      cursor: not-allowed;
    }
  
    /* Szabad szék stílusa */
    .seat.szabad {
      background-color: #0ee467;
      color: white;
    }
  
    /* Kiválasztott szék stílusa */
    .seat.selected {
      background-color: rgb(57, 197, 241);
      color: white;
    }
  
    /* Szék sor stílusa */
    .seat-row {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 4px;
      white-space: nowrap;
    }
  
    /* Modal body stílusa */
    .modal-body {
      text-align: center;
    }
  
    /* Gombok stílusa */
    .d-flex.flex-center.flex-row-fluid.pt-12 {
      justify-content: center;
    }
  
    /* Sor felirat stílusa */
    .seat-row .row-label {
      margin-right: 8px;
      text-align: center;
    }
  
    /* Székek konténer */
    .seats-container {
      display: flex;
      justify-content: center;
    }
  
    /* Oszlop címkék */
    .column-labels {
      display: flex;
      justify-content: center;
      margin-top: 4px;
    }
  
    /* Oszlop címke stílusa */
    .column-label {
      padding-left: 26%;
      text-align: center;
      color: #5e6278;
    }
  
    /* Színmagyarázat */
    .szinsegitseg {
      margin-bottom: 12px;
    }
  
    .szinsegitseg span {
      display: inline-block;
      margin: -2px 5px 0 0;
      width: 16px;
      height: 16px;
      vertical-align: middle;
      border-radius: 5px;
    }
  
    .szinsegitseg .free {
      background: #0ee467;
    }
  
    .szinsegitseg .busy {
      background: rgb(231, 49, 22);
    }
  
    .szinsegitseg .selected {
      background: rgb(57, 197, 241);
    }
  
    /* Média lekérdezés még kisebb képernyőkre (tabletek) */
    @media (max-width: 992px) {
      .seat {
        width: 23px;
        height: 23px;
        margin: 3px;
        line-height: 30px;
        font-size: 0.6em;
      }
  
      .column-label {
        font-size: 0.55em;
        padding-left: 32%;
      }
  
      .seat-row .row-label {
        font-size: 0.6em;
        margin-right: 4px;
      }
  
      .szinsegitseg span {
        width: 14px;
        height: 14px;
        margin: -1px 4px 0 0;
      }
    }
  
    /* Média lekérdezés még kisebb képernyőkre (mobilok) */
    @media (max-width: 600px) {
      .seat {
        width: 17px;
        height: 17px;
        margin: 2px;
        line-height: 25px;
        font-size: 0.55em;
      }
  
      .column-label {
        font-size: 0.5em;
        padding-left: 25%;
      }
  
      .seat-row .row-label {
        font-size: 0.6em;
        margin-right: 3px;
      }
  
      .szinsegitseg span {
        width: 12px;
        height: 12px;
        margin: -1px 3px 0 0;
      }
    }
  
    .modal-dialog {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
  
    .seats {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  
    .seats .row {
      display: flex;
      justify-content: center;
      margin-bottom: 4px;
    }
  
    .modal-content {
      margin: 0 auto;
    }
  </style>
  
</div>
