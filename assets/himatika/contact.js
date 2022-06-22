
        const scriptURL = 'https://script.google.com/macros/s/AKfycby_HYZ9BnMVbuEX5HwkAAietvezJqB7RTdD-I3vlOXmrT9Ehl1yUaLFYjMK3nJsgSP4jg/exec'
        const form = document.forms['web-feedback']
        const btnKirim = document.querySelector('.send');
        const btnLoading = document.querySelector('.wait');
        const alert = document.querySelector('.success-notification');

        form.addEventListener('submit', e => {
            e.preventDefault();

            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');
            fetch(scriptURL, { method: 'POST', body: new FormData(form) })
                .then(response => {
                    btnLoading.classList.toggle('d-none');
                    btnKirim.classList.toggle('d-none');
                    alert.classList.toggle('d-none');
                    alert.classList.toggle('d-flex');
                    form.reset();
                    console.log('Success!', response);
                })
                .catch(error => console.error('Error!', error.message))
        })
        const close = document.querySelector('.feedback .close');
        close.addEventListener('click', () => {
            alert.classList.toggle('d-none');
            alert.classList.toggle('d-flex');
        })
