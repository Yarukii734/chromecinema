<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
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
					<li class="breadcrumb-item text-muted">Kezdőlap</li>
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
		<div id="kt_app_content_container" class="app-container container-fluid">
			<!--begin::Row-->
			<div class="row gx-5 gx-xl-10">
				<!--begin::Col-->
				<div class="col-xl-6 mb-5 mb-xl-10" bis_skin_checked="1">
					<!--begin::Engage widget 6-->
					<div class="card flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color:#020202;background-image:url('https://play-lh.googleusercontent.com/XujhcvV-Mt7BBheyIiY_yWaVZKutxuhZi17IXRvx2axroT4Y-yp0HRYsyQKNIuE9Cxwqaq9k5KeL-3eT1Ok6')" bis_skin_checked="1">
						<!--begin::Body-->
						<div class="card-body d-flex justify-content-between flex-column ps-xl-18" bis_skin_checked="1">
							<!--begin::Heading-->
							<div class="mb-20 pt-xl-13" bis_skin_checked="1">
								<!--begin::Title-->
								<h3 class="fw-bold text-white fs-2x mb-5 ms-n1">Mad Max: A harag útja (2015)</h3>
								<!--end::Title-->
								<!--begin::Description-->
								<span class="fw-bold text-white fs-4 mb-8 d-block lh-0">George Miller rendezésével</span>
								<!--end::Description-->
								<!--begin::Items-->
								<div class="d-flex align-items-center" bis_skin_checked="1">
									<!--begin::Item-->
									<div class="d-flex align-items-center me-6" bis_skin_checked="1">
										<!--begin::Icon-->
										<a href="#" class="me-2">
											<i class="bi bi-ticket-perforated text-primary fs-3"></i>
										</a>
										<!--end::Icon-->
										<!--begin::Info-->
										<span class="fw-semibold text-white fs-6">32 db hátralévő jegy</span>
										<!--end::Info-->
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="d-flex align-items-center" bis_skin_checked="1">
										<!--begin::Icon-->
										<a href="#" class="me-2">
											<i class="bi bi-wallet2 text-primary fs-3"></i>
										</a>
										<!--end::Icon-->
										<!--begin::Info-->
										<span class="fw-semibold text-white fs-6">2.500 Ft</span>
										<!--end::Info-->
									</div>
									<!--end::Item-->
								</div>
								<!--end::Items-->
							</div>
							<!--end::Heading-->
							<!--begin::Action-->
							<div class="mb-xl-10 mb-3" bis_skin_checked="1">
								<a href="#" class="btn btn-primary fw-semibold me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Lefoglalás</a>
							</div>
							<!--begin::Action-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Engage widget 6-->
				</div>

				<div class="col-xxl-3 mb-5 mb-xl-10">
					<!--begin::Chart widget 8-->
					<div class="card card-flush h-md-50 mb-xl-10">
						<!--begin::Header-->
						<div class="card-header pt-5">
							<!--begin::Title-->
							<div class="card-title d-flex flex-column">
								<!--begin::Info-->
								<div class="d-flex align-items-center">
									<!--begin::Amount-->
									<span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $userCount }}</span>
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
								<span class="text-gray-400 pt-1 fw-semibold fs-6">Regisztrált felhasználók</span>
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
									<div class="bg-success rounded h-8px" role="progressbar" style="width: {{ $userCount/10 }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
								<span class="text-muted mt-1 fw-semibold fs-7">A héten <b>{{ $moviesCount }}</b> db  film vár rád.</span>
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
								<ul class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5" role="tablist">
									@foreach($weekDays as $index => $day)
										<li class="nav-item p-0 ms-0" role="presentation">
											<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger" 
											   :class="{ 'active': selectedDate === '{{ $day['full_date'] }}' }"
											   href="#" 
											   @click.prevent="selectedDate = '{{ $day['full_date'] }}'; $wire.selectDate('{{ $day['full_date'] }}')">
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
											<p class="text-gray-700 fw-semibold text-center fs-6">Nincs elérhető film ezen a napon.</p>
										@else
											@foreach($movies as $movie)
												<div class="d-flex align-items-center mb-6">
													<span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-{{ $movie->Category()->first()->color }}"></span>
													<div class="flex-grow-1 me-5">
														<div class="text-gray-800 fw-semibold fs-2">
															{{ $movie->vetitesidopont }} 
															<span class="text-gray-400 fw-semibold fs-7">({{ $movie->idotartam }})</span>
														</div>
														<div class="text-gray-700 fw-semibold fs-6">{{ $movie->filmnev }}</div>
														<div class="text-gray-400 fw-semibold fs-7">
															Hátralévő jegyek: <a href="#" class="text-primary opacity-75-hover fw-semibold">{{ $movie->darabszam }} darab</a>
														</div>
													</div>
													<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Lefoglalás</a>
												</div>
											@endforeach
										@endif
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
</div>