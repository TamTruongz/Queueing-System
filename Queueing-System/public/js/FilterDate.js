const dateStartInput = document.getElementById('dateStart');
const dateEndInput = document.getElementById('dateEnd');
const form = document.querySelector('form');

dateStartInput.addEventListener('input', handleFormSubmit);
dateEndInput.addEventListener('input', handleFormSubmit);

function handleFormSubmit() {
    if (dateStartInput.value && dateEndInput.value) {
        form.submit();
    }
}