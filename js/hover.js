document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input-field1 input, .input-field2 input, .input-field3 input');

    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (input.value !== '') {
                input.parentNode.classList.add('has-content');
            } else {
                input.parentNode.classList.remove('has-content');
            }
        });
    });
});