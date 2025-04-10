<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('mozi.fooldal') }}" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/mozi/img/mobile-default-dark.png ')}}" class="h-60px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item @if(!request()->is('admin/*')) here show @endif menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-title">Gyorselérés</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-850px">
                            <!--begin:Dashboards menu-->
                            <div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible" data-kt-menu-dismiss="true">
                                <!--begin:Row-->
                                <div class="row">
                                    <!--begin:Col-->
                                    <div class="col-lg-8 mb-3 mb-lg-0 py-3 px-3 py-lg-6 px-lg-6">
                                        <!--begin:Row-->
                                        <div class="row">
                                            <!--begin:Col-->
                                            <div class="col-lg-6 mb-3">
                                                <!--begin:Menu item-->
                                                <div class="menu-item p-0 m-0">
                                                    <!--begin:Menu link-->
                                                    <a href="{{route('mozi.fooldal')}}" class="menu-link active">
                                                        <span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                            <i class="ki-duotone ki-element-11 text-primary fs-1">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                            </i>
                                                        </span>
                                                        <span class="d-flex flex-column">
                                                            <span class="fs-6 fw-bold text-gray-800">Default</span>
                                                            <span class="fs-7 fw-semibold text-muted">Reports & statistics</span>
                                                        </span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>

                                        </div>
                                        <!--end:Row-->
                                        <div class="separator separator-dashed mx-5 my-5"></div>
                                        <!--begin:Landing-->
                                        <!--end:Landing-->
                                    </div>
                                    <!--end:Col-->
                                    <!--begin:Col-->
                                    <!--end:Col-->
                                </div>
                                <!--end:Row-->
                            </div>
                            <!--end:Dashboards menu-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item @if(request()->is('admin/*')) here show @endif menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                        <!--begin:Menu link-->
                        @if(auth()->user()->admin == 1)
                        <span class="menu-link">
                            <span class="menu-title">Adminisztráció</span>
                            <span class="menu-arrow d-lg-none"></span>
                        </span>
                    @endif
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('mozi.admin.filmfeltoltes') }}" title="Itt tudod feltölteni a filmeket." data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-rocket fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Film feltöltés</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('mozi.admin.filmszerkesztes') }}" title="Check out the complete documentation" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-abstract-26 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Film szerkesztés</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('mozi.admin.felhasznalokezeles') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-code fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Felhasználó kezelés</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('mozi.admin.snackfeltoltes') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-code fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Snack feltöltés</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('mozi.admin.snackszerkesztes') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-code fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Snack szerkesztés</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('mozi.admin.felhivasfeltoltes') }}">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-code fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Felhívás feltöltés</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::Search-->
                <div class="app-navbar-item align-items-stretch ms-1 ms-md-4">
                    <!--begin::Search-->
                    <div id="kt_header_search" class="header-search d-flex align-items-stretch" data-kt-search-keypress="false" data-kt-search-min-length="2" data-kt-search-layout="menu" data-kt-menu-trigger="manual" data-kt-menu-overflow="false" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
                        <!--begin::Search toggle-->
                        <div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">
                            <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px">
                                <i class="ki-duotone ki-magnifier fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Search toggle-->
                        <!--begin::Menu-->
                        <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-400px w-md-400px">
                            <!--begin::Wrapper-->
                            <div data-kt-search-element="wrapper">
                                <form data-kt-search-element="form" class="w-100 position-relative mb-3" autocomplete="off">
                                    <!--begin::Icon-->
                                    <div bis_skin_checked="1">
                                        <label class="form-label">Keresés</label>
                                        <div class="input-group mb-4" bis_skin_checked="1">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-magnifier fs-2 ">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <input type="text" class="form-control" wire:model="kereses" placeholder="pl: ChromeCinema2025" data-kt-search-element="input">
                                            <button class="btn btn-primary me-2 mb-2 mb-md-0 text-white" type="button" wire:loading.attr="disabled" wire:target="search" wire:click="search">
                                                <span wire:loading.remove="" wire:target="search"><i class="fa-solid fa-check"></i></span>
                                                <span wire:loading="" wire:target="search"><span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                                <!--begin::Search Button-->
                                
                                <!--end::Search Button-->
                                <!--begin::Search Results-->
                                @if(count($talalatok) > 0)
                                <div class="scroll-y me-n2 pe-2" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-offset="5px" bis_skin_checked="1" style="max-height: 400px; overflow-y: auto;' }}">
                                    <ul class="list-group mt-3">
                                        @foreach($talalatok as $movie)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <!-- Film kép -->
                                                <div class="d-flex align-items-center">
                                                    <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-{{ $movie->Category()->first()->color }}"></span>
                                                    <img src="{{ $movie->filmkep}}" alt="{{ $movie->filmnev }}" class="img-thumbnail me-3" style="width: 50px; height: 75px;">
                                                    <!-- Film név -->
                                                    <a href="#" class="text-dark">{{ $movie->filmnev }}</a>
                                                </div>
                                                <!-- Film darabszám -->
                                                <!-- Film darabszám -->
                                                <span class="badge bg-secondary me-3">{{ $movie->darabszam }} db</span>
                                                <!-- Lefoglalás gomb -->
                                                <button type="submit" class="btn btn-sm btn-light" >Megtalálható</button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @elseif($kereses && count($talalatok) == 0)
                                    <div class="text-center text-gray-600 fw-semibold pt-1">Nincs találat a keresésre.</div>
                                @endif
                            
                                <!--end::Search Results-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Search-->
                </div>
                
                
                
                <!--end::Search-->
                <!--begin::Notifications-->
                <div class="app-navbar-item ms-1 ms-md-4">
                    <!--begin::Menu- wrapper-->
                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
                        <i class="ki-duotone ki-notification-status fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset('https://i.imgur.com/9fgxK54.png') }}')">
                            <!--begin::Title-->
                            <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Felhívások
                            <span class="fs-8 opacity-75 ps-3">{{ $announcementCount }} darab</span></h3>
                            <!--end::Title-->
                            <!--begin::Tabs-->
                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">
                                <li class="nav-item">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_2">Értesítések</a>
                                </li>
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <div class="tab-pane fade active show" id="kt_topbar_notifications_2" role="tabpanel" bis_skin_checked="1">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column px-9" bis_skin_checked="1">
                                    <!--begin::Section-->
                                    <div class="pt-10 pb-0" bis_skin_checked="1">
                                        <!--begin::Title-->

                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <div class="scroll-y me-n2 pe-2" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-offset="5px" bis_skin_checked="1" style="height: 300px;">
                                        @if($announcementCount > 0)
                                            @foreach($announcements as $announcement)
                                            <div class="separator my-2" bis_skin_checked="1"></div>
                                            <div class="carousel-inner pt-6" bis_skin_checked="1">
                                                                                <!--begin::Item-->
                                                                                <!--end::Item-->
                                                                                <!--begin::Item-->
                                                                                <div class="carousel-item active" bis_skin_checked="1">
                                                                                    <!--begin::Wrapper-->
                                                                                    <div class="carousel-wrapper" bis_skin_checked="1">
                                                                                        <!--begin::Description-->
                                                                                        <div class="d-flex flex-column flex-grow-1" bis_skin_checked="1">
                                                                                            <a href="#" class="fw-bold text-dark text-hover-primary">{{ $announcement->title }}</a>
                                                                                            <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">{!! $announcement->content !!}</p>
                                                                                        </div>
                                                                                        <!--end::Description-->
                                                                                        <!--begin::Summary-->
                                                                                        <div class="d-flex flex-stack pt-8" bis_skin_checked="1">
                                                                                            <span class="badge badge-light-primary fs-7 fw-bold me-2">{{ $announcement->formatted_date }}</span>
                                                                                            <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">{{ $announcement->createdby ?? 'ChromeCinema'}}</a>
                                                                                        </div>
                                                                                        <!--end::Summary-->
                                                                                    </div>
                                                                                    <!--end::Wrapper-->
                                                                                </div>
                                                                                <!--end::Item-->
                                                                                <!--begin::Item-->
                                                                                <!--end::Item-->
                                            </div>
                                            @endforeach
                                            @else
                                                <p class="text-center text-muted">Nincs felhívás létrehozva.</p>
                                            @endif
                                         </div>
                                        <!--end::Text-->
                                        <!--begin::Action-->
                                        <div class="text-center mt-5 mb-9" bis_skin_checked="1">                                            
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Illustration-->
                                    
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Tab panel-->
                            <!--begin::Tab panel-->
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Notifications-->
                <!--begin::My apps links-->
                <div class="app-navbar-item ms-1 ms-md-4">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <a href="kosar" class="btn btn-color-gray-600 btn-active-color-primary">
                        <i class="ki-duotone ki-basket fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                        </a>
                    </div>
                    <!--begin::My apps-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-400px" data-kt-menu="true">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                
                                <div class="card-title fs-5 text-gray-800 text-hover-primary fw-bold">
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-success">
                                            <i class="ki-duotone ki-handcart fs-2 text-success">
                                            </i>
                                        </span>
                                    </div>
                                    Kosár                                   
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-5">
                                <!--begin::Scroll-->
                                
                                    <!--begin::Row-->
                                    <div class="row g-2">
                                        <div class="scroll-y me-n2 pe-2" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-offset="5px" bis_skin_checked="1" style="{{ $cartItems->isNotEmpty() ? 'max-height: 360px; overflow-y: auto;' : 'max-height: 40px;' }}' }}">
                                        @if($cartItems->isNotEmpty())
                                        @foreach($cartItems as $item)
                                    <table>
                                        <tr data-kt-pos-element="item">
                                            
                                            <td class="pe-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $item->type === 'movie' ? $item->movie()->first()->filmkep : $item->snack()->first()->kep }}" class="w-50px h-50px rounded-3 me-3" alt="">
                                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary me-1">{{ $item->type === 'movie' ? $item->movie()->first()->filmnev : $item->snack()->first()->nev }}</span>
                                                </div>
                                            </td>

                                            <td class="text-end">
                                                <span class="fw-bold text-primary fs-7" data-kt-pos-element="item-total">{{ number_format($item->ar, 0, ',', '.') }} Ft</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary text-hover-primary justify-content-end" wire:click="removeFromCart({{$item->id}})">                
                                                    <i class="ki-solid ki-abstract-11 fs-2 text-gray-500 me-n1"></i>                             
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    @else
                                        <tr>
                                            <div class="text-center text-gray-600 fw-semibold pt-1">A kosárba nincs tartalom.</div>
                                        </tr>
                                    @endif
                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="text-center mt-5 mb-9">
                                        @if($cartItems->isNotEmpty())
                                        <div class="d-flex flex-stack py-4">
                                            <!--begin::Section-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-35px me-4">
                                                    <span class="symbol-label bg-light-success">
                                                        <i class="ki-duotone ki-tag fs-2 text-success">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="mb-0 me-2">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Kosár eddigi összege</a>
                                                    <div class="text-gray-500 fs-7">{{ number_format($totalPrice, 0, ',', '.') }} Ft</div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Section-->
                                            <!--begin::Label-->
                                            <span class="badge badge-light fs-8">{{ $totalCartCount }} darab</span>
                                            <!--end::Label-->
                                        </div>
                                        @else

                                        @endif
                                        <a href="{{ route('mozi.kosar') }}" class="btn btn-sm btn-primary px-6">Kosárhoz</a>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::My apps-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::My apps links-->
                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/4140/4140048.png') }}" class="rounded-3" alt="user" />
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->vezeteknev }} {{ auth()->user()->keresztnev }}
                                        @if(auth()->user()->admin == 1)
                                            <i class="ki-duotone ki-verify fs-2 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            @endif
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="{{ route('mozi.fiok') }}" class="menu-link px-5">Fiók Kezelés</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <livewire:logout />
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                        <i class="ki-duotone ki-element-4 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!--end::Header menu toggle-->
                <!--begin::Aside toggle-->
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>