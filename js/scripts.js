document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const amount = document.querySelector('#amount');
            if (amount && amount.value <= 0) {
                e.preventDefault();
                alert('Amount must be greater than zero.');
            }
        });
    }
});