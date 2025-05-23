<div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">{{ now()->year }}&copy;</span>
            <a href="{{ route('mozi.fooldal') }}" target="_blank" class="text-gray-800 text-hover-primary">chromecinema.hu</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="{{ route('mozi.rolunk') }}" class="menu-link px-2">Rólunk</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('mozi.fooldal') }}" target="_blank" class="menu-link px-2">GY.I.K</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('mozi.fooldal') }}" target="_blank" class="menu-link px-2">Jegy vásárlás</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Footer container-->
</div>