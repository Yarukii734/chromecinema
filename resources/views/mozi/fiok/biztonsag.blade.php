<div class="tab-pane fade" id="biztonsag" role="tabpanel" aria-labelledby="biztonsag-line-tab" wire:ignore.self>
        <!--begin::Navbar-->
        
        <!--end::Navbar-->
        <!--begin::Row-->
        
        <!--end::Row-->
        <!--begin::Login sessions-->
        <!--end::Login sessions-->
        <!--begin::License usage-->
        <div class="card" bis_skin_checked="1">
            <!--begin::Card head-->
            <div class="card-header card-header-stretch" bis_skin_checked="1">
                <!--begin::Title-->
                <div class="card-title d-flex align-items-center" bis_skin_checked="1">
                    <i class="ki-duotone ki-calendar-8 fs-1 text-primary me-3 lh-0">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                    </i>
                    <h3 class="fw-bold m-0 text-gray-800">Tevékenység napló</h3>
                </div>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <!--end::Toolbar-->
            </div>
            <!--end::Card head-->
            <!--begin::Card body-->
            <div class="card-body" bis_skin_checked="1">
                <!--begin::Tab Content-->
                <div class="tab-content" bis_skin_checked="1">
                    <!--begin::Tab panel-->
                    <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab" bis_skin_checked="1">
                        <div class="scroll-y me-n2 pe-2" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-offset="5px" bis_skin_checked="1" style="height: 300px;">
                        <!--begin::Timeline-->
                        <div class="timeline" bis_skin_checked="1">
                            <!--begin::Timeline item-->
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                        @if($logs->isEmpty())
                            <div class="text-center fw-bold text-gray-800 py-4">
                                Nem történt se vásárlás, se interakció.
                            </div>
                        @else
                        @foreach ($logs as $log)
                        <div class="timeline-item" bis_skin_checked="1">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px" bis_skin_checked="1"></div>
                            <!--end::Timeline line-->
                            
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon symbol symbol-circle symbol-40px" bis_skin_checked="1">
                                <div class="symbol-label bg-light" bis_skin_checked="1">
                                    <!-- Check if the action is "Vásárlás" or not -->
                                    @if($log->action === 'Vásárlás')
                                        <i class="ki-duotone ki-basket fs-2 text-gray-500">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    @else
                                        <!-- If the action is not "Vásárlás", display a different icon -->
                                        <i class="ki-duotone ki-user fs-2 text-gray-500">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    @endif
                                </div>
                            </div>
                            <!--end::Timeline icon-->
                            
                            <!--begin::Timeline content-->
                            <div class="timeline-content mt-n1" bis_skin_checked="1">
                                <!--begin::Timeline heading-->
                                <div class="pe-3 mb-5" bis_skin_checked="1">
                                    <!--begin::Title-->
                                    <div class="fs-5 fw-semibold mb-2" bis_skin_checked="1">
                                        @if($log->action === 'Vásárlás')
                                            Új vásárlás!
                                        @else
                                            Egyéb esemény!
                                        @endif
                                        <a href="#" class="text-primary fw-bold me-1">#{{ $log->id }}</a>{{ $log->details }}
                                    </div>
                                    <!--end::Title-->
                                    
                                    <!--begin::Description-->
                                    <div class="d-flex align-items-center mt-1 fs-6" bis_skin_checked="1">
                                        <!--begin::Info-->
                                        <div class="text-muted me-2 fs-7" bis_skin_checked="1">
                                            @if($log->action === 'Vásárlás')
                                            Vásárolva - {{ $log->created_at->format('Y-m-d H:i') }}
                                            @else
                                            Végrehajtva - {{ $log->created_at->format('Y-m-d H:i') }}
                                            @endif
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Timeline heading-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        @endforeach
                    @endif
                            <!--end::Timeline item-->
                        </div>
                        <!--end::Timeline-->
                        </div>
                    </div>
                    <!--end::Tab panel-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::License usage-->
</div>