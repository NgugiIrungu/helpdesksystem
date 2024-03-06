// Fetch program information from the server
function fetchProgramInformation() {
    // Simulating a fetch request for demonstration purposes
    setTimeout(() => {
        const programData = {
            currentEnrolledUnits: 5, // Example value, replace with actual data
        };

        // Update the program information on the page
        updateProgramInformation(programData);
    }, 1000); // Simulating a delay of 1 second
}

// Update program information on the page
function updateProgramInformation(programData) {
    const currentEnrolledUnitsElement = document.getElementById('current-enrolled-units');
    if (currentEnrolledUnitsElement) {
        currentEnrolledUnitsElement.textContent = programData.currentEnrolledUnits;
    }
}

// Call the fetchProgramInformation function when the page loads
window.addEventListener('load', fetchProgramInformation);
