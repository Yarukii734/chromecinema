<div class="tab-pane fade" id="szamlazas" role="tabpanel" aria-labelledby="szamlazas-line-tab" wire:ignore.self>
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch pb-0">
            <!--begin::Title-->
            <div class="card-title">
                <h3 class="m-0">Payment Methods</h3>
            </div>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar m-0">
                <!--begin::Tab nav-->
                <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_billing_creditcard" aria-selected="true">Credit / Debit Card</a>
                    </li>
                    <!--end::Tab item-->
                    <!--begin::Tab item-->
                    <li class="nav-item" role="presentation">
                        <a id="kt_billing_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_billing_paypal" aria-selected="false" tabindex="-1">Paypal</a>
                    </li>
                    <!--end::Tab item-->
                </ul>
                <!--end::Tab nav-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Tab content-->
        <div id="kt_billing_payment_tab_content" class="card-body tab-content">
            <!--begin::Tab panel-->
            <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_creditcard_tab">
                <!--begin::Title-->
                <h3 class="mb-5">My Cards</h3>
                <!--end::Title-->
                <!--begin::Row-->
                <div class="row gx-9 gy-6">
                    <!--begin::Col-->
                    <div class="col-xl-6" data-kt-billing-element="card">
                        <!--begin::Card-->
                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                            <!--begin::Info-->
                            <div class="d-flex flex-column py-2">
                                <!--begin::Owner-->
                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">Marcus Morris
                                <span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
                                <!--end::Owner-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <img src="assets/media/svg/card-logos/visa.svg" alt="" class="me-4">
                                    <!--end::Icon-->
                                    <!--begin::Details-->
                                    <div>
                                        <div class="fs-4 fw-bold">Visa **** 1679</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at 09/24</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2">
                                <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Delete</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                                <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6" data-kt-billing-element="card">
                        <!--begin::Card-->
                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                            <!--begin::Info-->
                            <div class="d-flex flex-column py-2">
                                <!--begin::Owner-->
                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">Jacob Holder</div>
                                <!--end::Owner-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="me-4">
                                    <!--end::Icon-->
                                    <!--begin::Details-->
                                    <div>
                                        <div class="fs-4 fw-bold">Mastercard **** 2040</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at 10/22</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2">
                                <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Delete</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                                <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6" data-kt-billing-element="card">
                        <!--begin::Card-->
                        <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                            <!--begin::Info-->
                            <div class="d-flex flex-column py-2">
                                <!--begin::Owner-->
                                <div class="d-flex align-items-center fs-4 fw-bold mb-5">Jhon Larson</div>
                                <!--end::Owner-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Icon-->
                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="me-4">
                                    <!--end::Icon-->
                                    <!--begin::Details-->
                                    <div>
                                        <div class="fs-4 fw-bold">Mastercard **** 1290</div>
                                        <div class="fs-6 fw-semibold text-gray-400">Card expires at 03/23</div>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-2">
                                <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="card-delete">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Delete</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                                <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Edit</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <!--begin::Content-->
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Important Note!</h4>
                                    <div class="fs-6 text-gray-700 pe-7">Please carefully read
                                    <a href="#" class="fw-bold me-1">Product Terms</a>adding
                                    <br>your new payment card</div>
                                </div>
                                <!--end::Content-->
                                <!--begin::Action-->
                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add Card</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div id="kt_billing_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_paypal_tab">
                <!--begin::Title-->
                <h3 class="mb-5">My Paypal</h3>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="text-gray-600 fs-6 fw-semibold mb-5">To use PayPal as your payment method, you will need to make pre-payments each month before your bill is due.</div>
                <!--end::Description-->
                <!--begin::Form-->
                <form class="form">
                    <!--begin::Input group-->
                    <div class="mb-7 mw-350px">
                        <select name="timezone" data-control="select2" data-placeholder="Select an option" data-hide-search="true" class="form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700 select2-hidden-accessible" data-select2-id="select2-data-9-khne" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option data-select2-id="select2-data-11-mom0">Select an option</option>
                            <option value="25">US $25.00</option>
                            <option value="50">US $50.00</option>
                            <option value="100">US $100.00</option>
                            <option value="125">US $125.00</option>
                            <option value="150">US $150.00</option>
                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-10-nctj" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-lg fw-semibold fs-6 text-gray-700" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timezone-el-container" aria-controls="select2-timezone-el-container"><span class="select2-selection__rendered" id="select2-timezone-el-container" role="textbox" aria-readonly="true" title="Select an option">Select an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <!--end::Input group-->
                    <button type="submit" class="btn btn-primary">Pay with Paypal</button>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Tab panel-->
        </div>
        <!--end::Tab content-->
    </div>
    <div class="card mb-5 mb-xl-10" bis_skin_checked="1">
        <!--begin::Card header-->
        <div class="card-header" bis_skin_checked="1">
            <!--begin::Title-->
            <div class="card-title" bis_skin_checked="1">
                <h3>Billing Address</h3>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body" bis_skin_checked="1">
            <!--begin::Addresses-->
            <div class="row gx-9 gy-6" bis_skin_checked="1">
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="address" bis_skin_checked="1">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6" bis_skin_checked="1">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2" bis_skin_checked="1">
                            <div class="d-flex align-items-center fs-5 fw-bold mb-5" bis_skin_checked="1">Address 1
                            <span class="badge badge-light-success fs-7 ms-2">Primary</span></div>
                            <div class="fs-6 fw-semibold text-gray-600" bis_skin_checked="1">Ap #285-7193 Ullamcorper Avenue
                            <br>Amesbury HI 93373
                            <br>US</div>
                        </div>
                        <!--end::Details-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2" bis_skin_checked="1">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="address-delete">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Delete</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Edit</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="address" bis_skin_checked="1">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6" bis_skin_checked="1">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2" bis_skin_checked="1">
                            <div class="d-flex align-items-center fs-5 fw-bold mb-3" bis_skin_checked="1">Address 2</div>
                            <div class="fs-6 fw-semibold text-gray-600" bis_skin_checked="1">Ap #285-7193 Ullamcorper Avenue
                            <br>Amesbury HI 93373
                            <br>US</div>
                        </div>
                        <!--end::Details-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2" bis_skin_checked="1">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="address-delete">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Delete</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Edit</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="address" bis_skin_checked="1">
                    <!--begin::Address-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6" bis_skin_checked="1">
                        <!--begin::Details-->
                        <div class="d-flex flex-column py-2" bis_skin_checked="1">
                            <div class="d-flex align-items-center fs-5 fw-bold mb-3" bis_skin_checked="1">Address 3</div>
                            <div class="fs-6 fw-semibold text-gray-600" bis_skin_checked="1">Ap #285-7193 Ullamcorper Avenue
                            <br>Amesbury HI 93373
                            <br>US</div>
                        </div>
                        <!--end::Details-->
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2" bis_skin_checked="1">
                            <button class="btn btn-sm btn-light btn-active-light-primary me-3" data-kt-billing-action="address-delete">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Delete</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Edit</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Address-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6" bis_skin_checked="1">
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed flex-stack h-xl-100 mb-10 p-6" bis_skin_checked="1">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap" bis_skin_checked="1">
                            <!--begin::Content-->
                            <div class="mb-3 mb-md-0 fw-semibold" bis_skin_checked="1">
                                <h4 class="text-gray-900 fw-bold">This is a very important note!</h4>
                                <div class="fs-6 text-gray-700 pe-7" bis_skin_checked="1">Writing headlines for blog posts is much science and probably cool audience</div>
                            </div>
                            <!--end::Content-->
                            <!--begin::Action-->
                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">New Address</a>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Addresses-->
            <!--begin::Tax info-->
            <div class="mt-10" bis_skin_checked="1">
                <h3 class="mb-3">Tax Location</h3>
                <div class="fw-semibold text-gray-600 fs-6" bis_skin_checked="1">United States - 10% VAT
                <br>
                <a class="fw-bold" href="#">More Info</a></div>
            </div>
            <!--end::Tax info-->
        </div>
        <!--end::Card body-->
    </div>
</div>