document.addEventListener('DOMContentLoaded', function() {
    var clearButton = document.getElementById('clear');
    clearButton.addEventListener('click', function(event) {
        event.preventDefault();
        var inputs = document.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.value = '';
            input.style.backgroundColor = ''; 
        });
    });

    var form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        var inputs = form.querySelectorAll('input');

        var hasEmptyInputs = false;

        inputs.forEach(function(input) {
            if (input.value.trim() === '' || input.value === null) {
                input.style.backgroundColor = 'red';
                hasEmptyInputs = true;
            } else {
                input.style.backgroundColor = '';
            }
        });

        if (hasEmptyInputs) {
            event.preventDefault();
        }
    });
});