document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.register-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); 
        })
        .catch(error => console.error('Error:', error));
    });
});