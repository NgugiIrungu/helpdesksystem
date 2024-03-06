document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('.login-form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // You can handle the response as needed (e.g., redirecting to a dashboard page)
        })
        .catch(error => console.error('Error:', error));
    });
});
