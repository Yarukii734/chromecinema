<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
	  <!--begin::Toolbar container-->
	  <div
		id="kt_app_toolbar_container"
		class="app-container container-fluid d-flex flex-stack"
	  >
		<!--begin::Page title-->
		<div
		  class="page-title d-flex flex-column justify-content-center flex-wrap me-3"
		>
		  <!--begin::Title-->
		  <h1
			class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"
		  >
			Kezelőfelület
		  </h1>
		  <!--end::Title-->
		  <!--begin::Breadcrumb-->
		  <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
			<!--begin::Item-->
			<li class="breadcrumb-item text-muted">
			  <a
				href="{{ route('mozi.fooldal') }}"
				class="text-muted text-hover-primary"
				>Főoldal</a
			  >
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="breadcrumb-item">
			  <span class="bullet bg-gray-400 w-5px h-2px"></span>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="breadcrumb-item text-muted">Kezdőlap</li>
			<!--end::Item-->
		  </ul>
		  <!--end::Breadcrumb-->
		</div>
		<div class="alert alert-info alert-warning fade show" role="alert" wire:offline>
		  <strong>Kapcsolati probléma!</strong> Úgy tűnik, hogy az internetkapcsolat
		  megszakadt. Az adatok frissítése valószínűleg nem fog megfelelően működni.
		  Kérjük, ellenőrizd a kapcsolatot.
		</div>
		<!--end::Page title-->
	  </div>
	  <!--end::Toolbar container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
	  <!--begin::Content container-->
	  <div id="kt_app_content_container" class="app-container container-fluid">
		<!--begin::Row-->
		<div class="row gx-5 gx-xl-10">
		  <!--begin::Col-->
		  @if($movies->count() > 0)
		  <div class="col-xl-6 mb-5 mb-xl-10" wire:poll.10s="loadMovieData">
			<div
			  class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end mb-xl-10"
			  style="
				background-color: #020202;
				background-image: url('{{ $movies[$currentMovieIndex]->filmkep }}');
			  "
			>
			  <div class="card-body d-flex justify-content-between flex-column ps-xl-18">
				<div class="mb-20 pt-xl-13">
				  <!-- A film adatai itt változnak -->
				  <h3 class="fw-bold text-white fs-2x mb-5 ms-n1">
					{{ $movies[$currentMovieIndex]->filmnev }}
				  </h3>
				  <span class="fw-bold text-white fs-4 mb-8 d-block lh-0">Kiadás éve
					- {{ $movies[$currentMovieIndex]->film_ev }}</span>
				  <div class="d-flex align-items-center mb-10">
					<div class="d-flex align-items-center me-6">
					  <a href="#" class="me-2">
						<i class="bi bi-ticket-perforated text-primary fs-3"></i>
					  </a>
					  <span class="fw-semibold text-white fs-6">{{
						$movies[$currentMovieIndex]->darabszam
					  }} db hátralévő jegy</span>
					</div>
					<div class="d-flex align-items-center">
					  <a href="#" class="me-2">
						<i class="bi bi-wallet2 text-primary fs-3"></i>
					  </a>
					  <span class="fw-semibold text-white fs-6">
						{{ number_format($movies[$currentMovieIndex]->jegyar, 0, ',', '.')
						}} Ft</span
					  >
					</div>
				  </div>
				</div>
				<div class="mb-xl-10 mb-3">
				  <!-- Módosított gomb -->
				  @if($this->isBookingAvailable($movies[$currentMovieIndex]))
				  <button
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
					class="btn btn-primary fw-semibold me-2"
					wire:click="openSeatSelectionModal({{ $movies[$currentMovieIndex]->id }})"
				  >
					Székfoglalás
				  </button>
				  @else
				  <button class="btn btn-secondary" disabled>Nem foglalható</button>
				  @endif
				</div>
			  </div>
			</div>
		  </div>
		  @else
		  <div class="col-xl-6 mb-5 mb-xl-10">
			<div
			  class="card flex-grow-1 text-center p-5"
			  style="background-color: #15171c"
			>
			  <h3 class="fw-bold text-white fs-1x mb-5">
				Nincs elérhető film ezen a napon.
			  </h3>
			  <p class="text-gray-700 fw-semibold text-center fs-6">
				Kérjük, válassz egy másik dátumot!
			  </p>
			</div>
		  </div>
		  @endif
  
		  <div class="col-xxl-3 mb-5 mb-xl-10">
			<!--begin::Chart widget 8-->
			<div class="card card-flush min-h-sm-125px mb-xl-10">
			  <!--begin::Header-->
			  <div class="card-header pt-5">
				<!--begin::Title-->
				<div class="card-title d-flex flex-column">
				  <!--begin::Info-->
				  <div class="d-flex align-items-center">
					<!--begin::Amount-->
					<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{
					  $userCount
					}}</span>
					<!--end::Amount-->
					<!--begin::Badge-->
					@if ($registrationChangePercentage >= 0)
					<span class="badge badge-light-success fs-base">
					  <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
						<span class="path1"></span>
						<span class="path2"></span>
					  </i>{{ $registrationChangePercentage }}%
					</span>
					@else
					<span class="badge badge-light-danger fs-base">
					  <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
						<span class="path1"></span>
						<span class="path2"></span>
					  </i>{{ $registrationChangePercentage }}%
					</span>
					@endif
					<!--end::Badge-->
				  </div>
				  <!--end::Info-->
				  <!--begin::Subtitle-->
				  <span class="text-gray-400 pt-1 fw-semibold fs-6">Regisztrált
					felhasználók</span>
				  <!--end::Subtitle-->
				</div>
				<!--end::Title-->
			  </div>
			  <!--end::Header-->
			  <!--begin::Card body-->
			  <div class="card-body d-flex align-items-end pt-0">
				<!--begin::Progress-->
				<div class="d-flex align-items-center flex-column mt-3 w-100">
				  <div class="d-flex justify-content-between w-100 mt-auto mb-2">
					<span class="fw-bolder fs-6 text-dark">1000 Regisztráció cél</span>
					<span class="fw-bold fs-6 text-gray-400">{{ $userCount/10 }}%</span>
				  </div>
				  <div class="h-8px mx-3 w-100 bg-light-success rounded">
					<div
					  class="bg-success rounded h-8px"
					  role="progressbar"
					  style="width: {{ $userCount/10 }}%"
					  aria-valuenow="50"
					  aria-valuemin="0"
					  aria-valuemax="100"
					></div>
				  </div>
				</div>
				<!--end::Progress-->
			  </div>
			  <!--end::Card body-->
			</div>
			<!--end::Chart widget 8-->
		  </div>
  
		  <div class="col-lg-12 col-xl-12 col-xxl-3 mb-5 mb-xl-0" bis_skin_checked="1">
			<!--begin::Timeline widget 3-->
			<div class="card h-md-100" bis_skin_checked="1">
			  <!--begin::Header-->
			  <div class="card-header border-0 pt-5" bis_skin_checked="1">
				<h3 class="card-title align-items-start flex-column">
				  <span class="card-label fw-bold text-dark">Heti filmjeink</span>
				  <span class="text-muted mt-1 fw-semibold fs-7">A héten
					<b>{{ $moviesCount }}</b> db film vár rád.</span>
				</h3>
				<!--begin::Toolbar-->
				<div class="card-toolbar" bis_skin_checked="1">
				  <a href="#" class="btn btn-sm btn-light">Hamarosan</a>
				</div>
				<!--end::Toolbar-->
			  </div>
			  <!--end::Header-->
			  <!--begin::Body-->
			  <div class="card-body pt-7 px-0" bis_skin_checked="1">
				<!--begin::Nav-->
				<div x-data="{ selectedDate: '{{ $weekDays[0]['full_date'] }}' }">
				  <!-- Hét napjainak navigációja -->
				  <ul
					class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5"
					role="tablist"
				  >
					@foreach($weekDays as $index => $day)
					<li class="nav-item p-0 ms-0" role="presentation">
					  <a
						class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
						:class="{ 'active': selectedDate === '{{ $day['full_date'] }}' }"
						href="#"
						@click.prevent="selectedDate = '{{ $day['full_date'] }}'; $wire.selectDate('{{ $day['full_date'] }}')"
					  >
						<span class="fs-7 fw-semibold">{{ $day['day'] }}</span>
						<span class="fs-6 fw-bold">{{ $day['date'] }}</span>
					  </a>
					</li>
					@endforeach
				  </ul>
				  <!--end::Nav-->
				  <!--begin::Tab Content (ishlamayabdi)-->
				  <div class="tab-content mb-2 px-9">
					<template x-if="selectedDate">
					  <div>
						@if($movies->isEmpty())
						<p class="text-gray-700 fw-semibold text-center fs-6">
						  Nincs elérhető film ezen a napon.
						</p>
						@else @foreach($movies as $movie)
						<div class="d-flex align-items-center mb-6">
						  <span
							data-kt-element="bullet"
							class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-{{
							  $movie->Category()->first()->color
							}}"
						  ></span>
						  <div class="flex-grow-1 me-5">
							<div class="text-gray-800 fw-semibold fs-2">
							  {{ $movie->vetitesidopont }}
							  <span class="text-gray-400 fw-semibold fs-7"
								>({{ $movie->idotartam }})</span
							  >
							</div>
							<div class="text-gray-700 fw-semibold fs-6">
							  {{ $movie->filmnev }}
							</div>
							<div class="text-gray-400 fw-semibold fs-7">
							  Hátralévő jegyek:
							  <a
								href="#"
								class="text-primary opacity-75-hover fw-semibold"
								>{{ $movie->darabszam }} darab</a
							  >
							</div>
						  </div>
  
						  <!-- Módosított gomb -->
						  @if($this->isBookingAvailable($movie))
						  <button
							type="submit"
							class="btn btn-sm btn-light"
							wire:click="openSeatSelectionModal({{ $movie->id }})"
						  >
							Székfoglalás
						  </button>
						  @else
						  <button type="submit" class="btn btn-sm btn-light" disabled>
							Nem foglalható
						  </button>
						  @endif
						</div>
						@endforeach @endif
					  </div>
					</template>
				  </div>
				</div>
				<!--end::Tab Content-->
			  </div>
			  <!--end: Card Body-->
			</div>
  
			<!--end::Timeline widget 3-->
		  </div>
		  <!--begin::Col-->
		  <!--end::Col-->
		</div>
  
		<!--end::Row-->
	  </div>
	  <!--end::Content container-->
	</div>
	<!--end::Content-->
  
	<!-- Székfoglalás modal -->
<!-- Székfoglalás modal -->
@if($isModalOpen && $selectedMovie)
<div
  class="modal fade show"
  tabindex="-1"
  style="display: block"
  aria-modal="true"
  role="dialog"
>
  <div class="modal-dialog modal-xl">
    <div class="modal-content rounded">
      <div class="modal-header justify-content-end border-0 pb-0">
        <button
          type="button"
          class="btn-close"
          wire:click="closeSeatSelectionModal"
        ></button>
      </div>
      <div class="modal-body pt-0 pb-15 px-5 px-xl-25">
		<div class="mb-2 text-center" bis_skin_checked="1">
			<h1 class="mb-3">Székfoglalás</h1>
			<div class="text-muted fw-semibold fs-5" bis_skin_checked="1">
			 Válassza ki a(z) {{ $selectedMovie->filmnev }} filmhez kívánt székeket.
			</div>
		   </div>
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
        <!-- Székek megjelenítése -->
        @if($selectedMovie->seats)
        <div class="seats">
          @foreach($selectedMovie->seats as $row => $seatsInRow)
          <div class="seat-row">
            <div class="row-label">Sor {{ $row + 1 }}:</div>
            @foreach($seatsInRow as $seat => $status)
            <button
              wire:click="selectSeat({{ $row }}, {{ $seat }})"
              class="seat {{ $status }} {{ $this->isSeatSelected($row, $seat) ? 'selected' : '' }}"
              {{ $status == 'foglalt' ? 'disabled' : '' }}
            >
            </button>
            @endforeach
          </div>
          @endforeach
		  <div class="column-labels">
            @foreach(range(1, count($selectedMovie->seats[0])) as $column)
            <div class="column-label">{{ $column }}</div>
            @endforeach
          </div>
        </div>
        @else
        <p>Nincsenek székek inicializálva.</p>
        @endif
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          wire:click="closeSeatSelectionModal"
        >
          Mégse
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
    </div>
  </div>
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
      width: 24px;
      height: 24px;
      margin: 3px;
      line-height: 30px;
      font-size: 0.6em;
    }

    .column-label {
      font-size: 0.55em;
      padding-left: 34%;
    }

    .seat-row .row-label {
      font-size: 0.7em;
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
      width: 18px;
      height: 18px;
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
  
