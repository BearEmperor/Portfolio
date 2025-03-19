document.addEventListener('DOMContentLoaded', function() {
    var clearButton = document.getElementById('clear');
    clearButton.addEventListener('click', function(event) {
        event.preventDefault();
        var confirmClear = confirm("Are you sure you want to clear the fields?");
        if (confirmClear) {
            var inputs = document.querySelectorAll('input, textarea');
            inputs.forEach(function(input) {
                input.value = '';
                input.style.backgroundColor = '';
            });
        }
    });

    var form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        var inputs = form.querySelectorAll('input');
        var textareas = form.querySelectorAll('textarea');
        var hasEmptyInputs = false;
        var hasEmptyTextareas = false;

        inputs.forEach(function(input) {
            if (input.value.trim() === '' || input.value === null) {
                input.style.backgroundColor = 'red';
                hasEmptyInputs = true;
            } else {
                input.style.backgroundColor = '';
            }
        });

        textareas.forEach(function(textarea) {
            if (textarea.value.trim() === '' || textarea.value === null) {
                textarea.style.backgroundColor = 'red';
                hasEmptyTextareas = true;
            } else {
                textarea.style.backgroundColor = '';
            }
        });

        if (hasEmptyInputs || hasEmptyTextareas) {
            event.preventDefault();
        }
    });


});