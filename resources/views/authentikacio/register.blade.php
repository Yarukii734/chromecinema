<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="post" wire:submit.prevent="register">
    <div class="text-center mb-10">
        <h1 class="text-dark mb-3">Regisztráció</h1>
        <div class="text-gray-400 fw-bold fs-4">Van fiókod? 
            <a href="{{ route('bejelentkezes') }}" class="link-primary fw-bolder">Jelentkezz be</a>
        </div>
        <div class="text-gray-400 fw-bold fs-4">Elfelejtetted a jelszavad? 
            <a href="{{ route('elfelejtettjelszo') }}" class="link-primary fw-bolder">Kérj emlékeztetőt!</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="fv-plugins-message-container invalid-feedback">
                    <label class="form-label fs-6 fw-bolder text-dark">Vezetéknév</label>
                    <input class="form-control form-control-lg form-control-solid" wire:model="vezeteknev" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="text" autocomplete="off" >
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="fv-plugins-message-container invalid-feedback">
                    <label class="form-label fs-6 fw-bolder text-dark">Keresztnév</label>
                    <input class="form-control form-control-lg form-control-solid" wire:model="keresztnev" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="text" autocomplete="off" >
                </div>
            </div>
        </div>
    </div>

    <div class="fv-row mb-10 fv-plugins-icon-container">
        <div class="fv-plugins-message-container invalid-feedback">
            <label class="form-label fs-6 fw-bolder text-dark">Felhasználónév</label>
            <input class="form-control form-control-lg form-control-solid" wire:model="felhasznalonev" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="text" autocomplete="off" >
        </div>
    </div>
    <div class="fv-row mb-10 fv-plugins-icon-container">
        <div class="fv-plugins-message-container invalid-feedback">
            <label class="form-label fs-6 fw-bolder text-dark">E-mail cím</label>
            <input class="form-control form-control-lg form-control-solid" wire:model="email" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="email" autocomplete="off" >
        </div>
    </div>	

    <div class="row">
        <div class="col-sm-6">
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="fv-plugins-message-container invalid-feedback">
                    <label class="form-label fs-6 fw-bolder text-dark">Jelszó</label>
                    <input class="form-control form-control-lg form-control-solid" wire:model="jelszo" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="password" autocomplete="off" >
                </div>
            </div>	
        </div>
        <div class="col-sm-6">
            <div class="fv-row mb-10 fv-plugins-icon-container">
                <div class="fv-plugins-message-container invalid-feedback">
                    <label class="form-label fs-6 fw-bolder text-dark">Jelszó megerősítés</label>
                    <input class="form-control form-control-lg form-control-solid" wire:model="jelszomegerosit" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px" type="password" autocomplete="off" >
                </div>
            </div>		
        </div>
    </div>
    
    				
    <div class="text-center">
        <button type="submit" class="btn btn-lg btn-primary w-100 mb-5 cooldown" style="-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;background:linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgb(36 102 129) 0%, rgb(36 153 111) 100%);">Regisztráció</button>
    </div>
</form>