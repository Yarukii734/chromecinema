<!DOCTYPE html>
<html lang="hu">
    @include('components.header')
	<body id="kt_body" class="bg-body" >
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-image:url(https://i.redd.it/iuwm9wigep651.png);">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<center>
								<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-120px" style="background-image: url('https://i.imgur.com/G03MurG.png');height: 150px;width: 150px;">
								</div>
							</center>
						</div>
            		<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20" style="@import 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap';font-family:poppins,sans-serif!important;">
						<div class="flex-column-fluid d-flex flex-column justify-content-center">
							<p class="font-weight-lighter text-white opacity-80" style="@import 'https://fonts.googleapis.com/css?family=Poppins:400,700&amp;display=swap';font-family:poppins,sans-serif!important;"><u><b>ChromeCinema</b></u></p>
								<p class="font-weight-lighter text-white opacity-80" style="@import 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap';font-family:poppins,sans-serif!important;">Lépj be a mozi világába, vásárolj jegyet a neked tetsző filmre, mellé egy jó nassolnivalót, és élvezd a mozi világát.<br> Ha nincs még fiókod, kattints a regisztráció felületre!</p>
						</div>
					</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px">
						</div>
					</div>
				</div>

				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							{{ $slot }}
						</div>
					</div>
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<div class="d-flex flex-center fw-bold fs-6">
							<a href="https://discord.chromecinema.hu/" class="text-muted text-hover-primary px-2" target="_blank">Discord</a>
              				<a href="mailto:info@chromecinema.hu" class="text-muted text-hover-primary px-2" target="_blank">Email</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('components.scripts')
	</body>
</html>