<!DOCTYPE html>
<html lang="en">
	@include('components.mozi.header')

	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">		
		<script>var defaultThemeMode = "dark"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "dark"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		

		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

				<livewire:mozi.components.navbar />

				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

					<livewire:mozi.components.sidebar />

					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						{{ $slot }}
					</div>

					@include('components.mozi.footer')

				</div>
			</div>
		</div>

		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
	</body>

	@include('components.mozi.scripts')
</html>
