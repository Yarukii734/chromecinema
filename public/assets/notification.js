document.addEventListener('livewire:init', () => {
    
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 300;
    toastr.options.closeEasing = 'swing';
    toastr.options.progressBar = true;
    toastr.options.preventDuplicates = true;

    Livewire.on('success', (event) => {
        toastr.success(event.message);
        if (event.redirect) {
            setTimeout(function() {
                window.location.href=event.redirect;
            }, 1500);
        }
    });

    Livewire.on('error', (event) => {
        toastr.error(event.message);
        if (event.redirect) {
            setTimeout(function() {
                window.location.href=event.redirect;
            }, 1500);
        }
    });
});