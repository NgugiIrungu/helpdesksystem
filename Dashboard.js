// Function to fetch data from the database and update the dashboard
function fetchDataAndUpdateDashboard() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the request (GET request to fetch data from the server-side script)
    xhr.open('GET', 'fetch_data.php', true);

    // Define the callback function to handle the response
    xhr.onload = function () {
        // Check if the request was successful (status code 200)
        if (xhr.status === 200) {
            // Parse the JSON response
            var data = JSON.parse(xhr.responseText);

            // Update dashboard with the fetched data
            updateDashboardWithData(data);
        } else {
            // Handle errors
            console.error('Error fetching data: ' + xhr.statusText);
        }
    };

    // Send the request
    xhr.send();
}

// Function to update the dashboard with fetched data
function updateDashboardWithData(data) {
    // Update dashboard widgets with the fetched data
    // Example:
    document.getElementById('totalOpenIssues').innerText = data.totalOpenIssues;
    document.getElementById('totalResolvedIssues').innerText = data.totalResolvedIssues;
    document.getElementById('announcements').innerText = data.announcements;
    // Similarly, update other dashboard elements
}

// Function to handle logout
function logout() {
    // Add logout functionality here, such as redirecting to the logout page
    alert('Logout clicked');
}

// Call the function to fetch data and update the dashboard
fetchDataAndUpdateDashboard();
