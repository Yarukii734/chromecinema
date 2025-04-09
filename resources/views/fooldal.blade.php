<div class="section-wrapper" x-data="{ selectedDate: '{{ $weekDays[0]['full_date'] }}' }">
	<div class="mobile-section reaper"></div>
		<div id="day-tabs-wrapper" bis_skin_checked="1">
			<div id="day-tab-swiper" class="wrapper nopadding" bis_skin_checked="1">
				@foreach($weekDays as $index => $day)
				<div class="swiper-wrapper" bis_skin_checked="1">
					<div class="swiper-slide" :class="{ 'selected': selectedDate === '{{ $day['full_date'] }}' }"
					href="#" 
					@click.prevent="selectedDate = '{{ $day['full_date'] }}'; $wire.selectDate('{{ $day['full_date'] }}')" bis_skin_checked="1">
									<div class="date" bis_skin_checked="1">{{ $day['day'] }}</div>
									<div class="dayname" bis_skin_checked="1">{{ $day['month'] }} {{ $day['date'] }}</div>
								</div>
							</div>
							@endforeach
			</div>
		</div>
		<div id="content" bis_skin_checked="1">
			<template x-if="selectedDate">
				<div id="day-tab-wrapper" class="wrapper" bis_skin_checked="1">
					@if ($movies->isEmpty())
					<div class="no-movies" style="text-align: center; font-size: 18px; padding: 20px; color: black;">
						Nincs elérhető film ezen a napon.
					</div>
				@else
					@foreach($movies as $movie)
						<div class="movie-box" bis_skin_checked="1">
								<div class="poster" bis_skin_checked="1">
									<img src="{{ $movie->filmkep }}">
								</div>
									<div class="info" bis_skin_checked="1">
										<div class="title" bis_skin_checked="1"><a href="{{ route('mozi.kosar') }}">{{ $movie->filmnev }}</a></div>
										<div class="meta" bis_skin_checked="1"><img src="{{ $movie->korhatar }}"><div class="genre" bis_skin_checked="1">{{ $movie->Category()->first()->nev }}</div></div>
										<div class="description" bis_skin_checked="1">{{ $movie->filmleiras }}</div>
										<div class="times" bis_skin_checked="1">
											<div class="movie-time" bis_skin_checked="1"><a wire:click="addToCart({{ $movie->id }})"><span class="time"><em>{{ $movie->vetitesidopont }}</em></span></a></div>
										</div>
										
								</div>

						</div>
						@endforeach	
						@endif
				</div>

			</template>
		</div>
		<section class="creators" id="team">
			<h2 class="section-title glow color-5">Mozi csapatunk</h2>
			<div class="row-wrapper">
				<div class="card-wrapper col col-50">
					<div class="card col col-100">
						<div class="avatar">
							<img src="https://mc-heads.net/avatar/Yarukii" alt=""/>
						</div>
						<h3 class="color-f glow">Bojti Patrik</h3>
						<h4 class="color-4 color-format glow">Tulajdonos</h4>
					</div>
				</div>
				<div class="card-wrapper col col-50">
					<div class="card col col-100">
						<div class="avatar">
							<img src="https://mc-heads.net/avatar/puding053" alt=""/>
						</div>
						<h3 class="color-f glow">Rácz Ferenc</h3>
						<h4 class="color-4 color-format glow">Tulajdonos</h4>
					</div>
				</div>
			</div>
		</section>
		<section class="helpdesk" id="helpdesk">
			<h2 class="section-title glow color-9">Kapcsolat</h2>
			<div class="row-wrapper">
				<div class="col col-50" style="display:flex;justify-content:flex-end">
					<div class="contact_img"></div>
				</div>
				<div class="col col-50" style="display:flex;justify-content:center">
					<div class="text-wrapper">
					<span>
						<i class="far fa-envelope color-2"></i> 
						<a class="color-f color-hover-9" href="{{ route('aszf') }}">ÁSZF</a>
					</span>
					<span>
						<i class="fab fa-discord color-2"></i> 
						<a class="color-f color-hover-9" href="{{ route('adatvedelmi') }}">Adatvédelmi szabályzat</a>
					</span>
					<span>
						<i class="far fa-user-crown color-2"></i> Yarukii, fracz3641</span>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<h2>Partnereink:<br/>
			<a class="color-f color-hover-9" href="https://darksystems.hu/" target="_blank">DarkSystems</a><br/>
			
		</footer>
		<div id="payment" bis_skin_checked="1">
			<div class="wrapper" bis_skin_checked="1">
				<img src="{{ asset('assets/fooldal/images/payments-bg-white.png') }}">
				A kényelmes és biztonságos online fizetést a Stripe, Inc. egy globálisan működő pénzügyi szolgáltató cég biztosítja.
				<br>Stripe regisztrált szolgáltató.
				<br>
				<span class="copyright">Copyright <span class="year">2021 </span><br> ChromeCinema.hu © Minden jog fenntartva!</span>
				
			</div>
			<br>
		</div>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				Livewire.on('error', (data) => {
					toastr.error(data.message); 
				});
		
				Livewire.on('redirectToLogin', () => {
					setTimeout(function() {
						window.location.href = "/login"; 
					}, 4500); 
				});
			});
		</script>
		
