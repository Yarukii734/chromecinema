<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Vásárlás</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('mozi.kosar') }}" class="text-muted text-hover-primary">Pénztár</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Kosár</li>
                    </ul>
                </div>
                <div class="alert alert-info alert-warning fade show" role="alert" wire:offline>
                    <strong>Kapcsolati probléma!</strong> Úgy tűnik, hogy az internetkapcsolat megszakadt. Az adatok frissítése valószínűleg nem fog megfelelően működni. Kérjük, ellenőrizd a kapcsolatot.
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
                        <div class="card card-flush card-p-0 bg-transparent border-0">
                            <div class="card-body">
                                <ul class="nav nav-pills d-flex justify-content-between nav-pills-custom gap-3 mb-6" role="tablist">
                                    @if ($categories && $categories->count() > 0)
                                        @foreach ($categories as $category)
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg 
                                                    @if($selectedCategory == $category->id) active @endif"
                                                    wire:click.prevent="setCategory({{ $category->id }})"
                                                    data-bs-toggle="pill" 
                                                    href="#tartalom_{{ $category->id }}" 
                                                    style="width: 138px;height: 180px" 
                                                    aria-selected="{{ $selectedCategory == $category->id ? 'true' : 'false' }}" 
                                                    role="tab">
                                                    <div class="nav-icon mb-3">
                                                        <img src="{{ $category->kep }}" class="w-50px">
                                                    </div>
                                                    <div class="">
                                                        <span class="text-gray-800 fw-bold fs-2 d-block">{{ $category->nev }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <p>Nincs elérhető kategória.</p>
                                    @endif
                                </ul>
                            
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tartalom_{{ $selectedCategory }}" role="tabpanel">
                                        <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
                                            @if ($snacks && $snacks->isNotEmpty())
                                                @foreach($snacks as $snack)
                                                    <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                        <div class="card-body text-center">
                                                            <img src="{{ $snack->kep }}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
                                                            <div class="mb-2">
                                                                <div class="text-center">
                                                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">
                                                                        {{ $snack->nev }}
                                                                    </span>
                                                                </div>
                                                                <div class="text-center">
                                                                    <span class="fw-bold text-gray-400 cursor-pointer text-hover-primary fs-6 fs-l-1">
                                                                        {{ $snack->darabszam }} darab
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <span class="text-success text-end fw-bold fs-1">{{ number_format($snack->ar, 0) }} Ft</span>
                                                        </div>
                                                        @if($snack->darabszam > 0)
                                                        <button 
                                                        type="button" 
                                                        style="border-radius: 4px; background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);" 
                                                        class="btn btn-sm btn-primary px-6 relative" 
                                                        wire:click="addToCart({{ $snack->id }})"
                                                        wire:loading.attr="disabled" 
                                                        wire:target="addToCart({{ $snack->id }})" 
                                                    >
                                                        <!-- Normál állapot -->
                                                        <span wire:loading.remove wire:target="addToCart({{ $snack->id }})">Kosárba tétel</span>
                                                    
                                                        <!-- Betöltés állapot -->
                                                        <span wire:loading wire:target="addToCart({{ $snack->id }})" class="flex items-center justify-center">
                                                            <span>Feldolgozás...</span>
                                                            <svg class="animate-spin h-5 w-5 ml-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    
                                                    
                                                        @else
                                                        <button type="submit" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);" class="btn btn-sm btn-primary px-6" wire:click="nemfoglalhato()">Elfogyott</button>
                                                        @endif
                                                        
                                                    </div>
                                                @endforeach

                                            @else
                                            <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                <div class="card-body text-center">
                                                    <div class="mb-2">
                                                        <div class="text-center">
                                                            <span class="fw-bold text-gray-800 cursor-pointer fs-6 fs-xl-4">
                                                                <div class="symbol symbol-35px me-4">
                                                                    <span class="symbol-label bg-light-success">
                                                                        <i class="ki-duotone ki-information-5 fs-2 text-danger">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span>
                                                                </div>
                                                                Nincs elérhető snack a kategóriában.
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="flex-row-auto w-xl-450px">
                        <div class="card card-flush bg-body" id="kt_pos_form">
                            <div class="card-header pt-5">
                                <h3 class="card-title fw-bold text-gray-800 fs-1qx">
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-success">
                                            <i class="ki-duotone ki-two-credit-cart fs-2 text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </span>
                                    </div>
                                    Kosár tartalma</h3>
                                    <div class="card-toolbar">
                                        <a href="#" 
                                            class="btn btn-light-primary fs-4 fw-bold py-4" 
                                            wire:click="clearUserCart" 
                                            wire:loading.attr="disabled"
                                            wire:loading.target="clearUserCart" 
                                        >
                                            <!-- Kosár törlés szöveg vagy spinner -->
                                            <span wire:loading.remove wire:target="clearUserCart">Kosár törlése</span>
                                            <span wire:loading wire:target="clearUserCart">Feldolgozás...</span>
                                    
                                            <!-- Spinner -->
                                            <span wire:loading wire:target="clearUserCart" class="ml-2">
                                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    
                                    
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive mb-8">
                                    <table class="table align-middle gs-0 gy-4 my-0">
                                        <thead>
                                            <tr>
                                                <th class="min-w-160px"></th>
                                                <th class="w-120px"></th>
                                                <th class="w-100px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($cartItems->isNotEmpty())
                                            @foreach($cartItems as $item)
                                            <tr data-kt-pos-element="item">
                                                
                                                <td class="pe-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $item->type === 'movie' ? $item->movie()->first()->filmkep : $item->snack()->first()->kep }}" class="w-50px h-50px rounded-3 me-3" alt="">
                                                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">
                                                            {{ $item->type === 'movie' ? $item->movie()->first()->filmnev : $item->snack()->first()->nev }}
                                                            @if($item->type === 'movie' && $item->seat_row !== null && $item->seat_column !== null)
                                                                Sor: {{ $item->seat_row + 1 }} Szék: {{ $item->seat_column + 1 }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                
                                                
                                                <td class="pe-0">
                                                    <div class="position-relative d-flex align-items-center">
                                                        <input type="text" class="form-control border-0 text-center px-0 fs-4 fw-bold text-gray-800 w-30px" readonly="readonly" value="{{ $item->darabszam }}"><span class="fw-bold text-gray-600 cursor-pointer text-hover-primary fs-5 me-3"> darab</span>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <span class="fw-bold text-primary fs-7" data-kt-pos-element="item-total">{{ number_format($item->ar, 0) }} Ft</span>
                                                </td>
                                                <td class="text-end">
                                                    <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary text-hover-primary justify-content-end" wire:click="removeFromCart({{$item->id}})">                
                                                        <i class="ki-solid ki-abstract-11 fs-2 text-gray-500 me-n1"></i>                             
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" class="text-center fw-bold text-gray-800 py-4">
                                                    Üres a kosarad.
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);">
                                    <div class="fs-6 fw-bold text-white">
                                        <span class="d-block lh-1 mb-2">Összes vásárolt termék</span>
                                        <!--<span class="d-block mb-2">Kedvezmények</span>!-->
                                        <span class="d-block mb-9">Áfa(27%)</span>
                                        <span class="d-block fs-2qx lh-1">Végösszeg</span>
                                    </div>
                                    <div class="fs-6 fw-bold text-white text-end">
                                        <span class="d-block lh-1 mb-2" data-kt-pos-element="total">{{ $totalCartCount }} darab</span>
                                        <!--<span class="d-block mb-2" data-kt-pos-element="discount">-2.500 Ft</span>!-->
                                        <span class="d-block mb-9" data-kt-pos-element="tax">Áraink tartalmazzák</span>
                                        <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">{{ number_format($totalPrice, 0, ',') }} Ft</span>
                                    </div>
                                </div>
                                <div class="m-0">
                                    <h1 class="fw-bold text-gray-800 mb-2">Fizetési lehetőségek</h1><div class="fs-7 text-gray-700 mb-5" bis_skin_checked="1">Kártya számhoz használd: 4242 4242 4242 4242 kombinációt.</div>
                                    <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-6" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                                        <label class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="1">
                                            <i class="ki-duotone ki-credit-cart fs-2hx mb-2 pe-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <span class="fs-7 fw-bold d-block">Kártya</span>
                                        </label>
                                    </div>
                                    <div class="d-flex flex-column mb-5 fv-row" bis_skin_checked="1">
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!--end::Input-->
                                    </div>
                                    <button class="btn btn-primary fs-1 w-100 py-4" 
                                    wire:click="checkout" 
                                    wire:loading.attr="disabled"
                                    wire:loading.target="checkout"
                                    style="border-radius: 4px; background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(79 153 183) 0%, rgb(16 197 132) 100%);"
                                >
                                    <!-- Gomb szöveg változása -->
                                    <span wire:loading.remove wire:target="checkout">Vásárlás</span>
                                    <span wire:loading wire:target="checkout">Feldolgozás...</span>
                                
                                    <!-- Spinner -->
                                    <span wire:loading wire:target="checkout" class="ml-2">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                        </svg>
                                    </span>
                                </button>
                                
                                
                                    <br><br>
                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6" bis_skin_checked="1">
                                        <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        <div class="d-flex flex-stack flex-grow-1" bis_skin_checked="1">
                                            <div class="fw-semibold" bis_skin_checked="1">
                                                <h4 class="text-gray-900 fw-bold">Kérjük vedd figyelembe!</h4>
                                                <div class="fs-6 text-gray-700" bis_skin_checked="1"> Amennyiben olyan terméket vásároltál meg amit nem akartál írj email-t a
                                                <a class="fw-bold" href="mailto:info@chromecinema.hu">info@chromecinema.hu</a>-ra.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('error', (data) => {
            toastr.error(data.message); 
        });

        Livewire.on('redirectToKosar', () => {
            setTimeout(function() {
                window.location.href = "/kosar"; 
            }, 3000); 
        });
    });
</script>


