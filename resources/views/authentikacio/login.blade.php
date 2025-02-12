<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="post" wire:submit.prevent="login">
	<div class="text-center mb-10">
		<h1 class="text-dark mb-3">Bejelentkezés</h1>

		<div class="text-gray-400 fw-bold fs-4">Nincs fiókod? 
			<a href="{{ route('regisztracio') }}" class="link-primary fw-bolder">Regisztrálj</a>
		</div>
		<div class="text-gray-400 fw-bold fs-4">Elfelejtetted a jelszavad? 
			<a href="{{ route('elfelejtettjelszo') }}" class="link-primary fw-bolder">Kérj emlékeztetőt!</a>
		</div>
	</div>

	<div class="fv-row mb-10 fv-plugins-icon-container">
		<label class="form-label fs-6 fw-bolder text-dark">Email cím</label>
		<input class="form-control form-control-lg form-control-solid" wire:model="email" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="email" autocomplete="off">
		
	</div>
	<div class="fv-row mb-10 fv-plugins-icon-container">
		<div class="position-relative mb-3">
			<label class="form-label fs-6 fw-bolder text-dark" onclick="seenPassword()">Jelszó</label>
			<input class="form-control form-control-lg form-control-solid" wire:model="jelszo" id="password" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="password" autocomplete="off">
		</div>	
	</div>					
	<div class="text-center">
		<button type="submit" class="btn btn-lg btn-primary w-100 mb-5 cooldown" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;background:linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(36 102 129) 0%, rgb(36 153 111) 100%);">Bejelentkezés</button>
	</div>
</form>
