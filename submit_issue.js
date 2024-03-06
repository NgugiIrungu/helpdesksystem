document.addEventListener('DOMContentLoaded', function() {
    const issueForm = document.getElementById('issueForm');

    issueForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Fetch input values
        const issueName = document.getElementById('issueName').value;
        const issueDescription = document.getElementById('issueDescription').value;
        const targetPerson = document.getElementById('targetPerson').value;
        const issueSemester = document.getElementById('issueSemester').value;

        // Validate input values (You can add custom validation here)

        // Construct data object
        const formData = {
            issueName: issueName,
            issueDescription: issueDescription,
            targetPerson: targetPerson,
            issueSemester: issueSemester
        };

        // Simulate sending form data to the server (replace with actual AJAX call)
        console.log(formData);

        // Redirect to dashboard after form submission
        window.location.href = 'dashboard.html';
    });
});
