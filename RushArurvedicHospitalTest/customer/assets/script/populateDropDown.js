/**
 * Fetches data from a server and populates a dropdown.
 *
 * @param {string} apiUrl - The base URL of the API.
 * @param {string} dropdownId - The ID of the dropdown to populate.
 * @param {string} type - The type parameter to specify which data to fetch.
 */
function populateDropdown(apiUrl, dropdownId, type) {
    fetch(`${apiUrl}?type=${type}`) // Append the type query parameter
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json(); // Parse JSON response
        })
        .then(data => {
            if (data.error) {
                console.error('Error from server:', data.error);
                alert('Failed to fetch data from the server.');
                return;
            }

            const dropdown = document.getElementById(dropdownId);
            dropdown.innerHTML = '<option value="">Select an option</option>'; // Clear existing options
            data.forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option.id; // Use the 'id' field from the database
                newOption.textContent = option.name; // Use the 'name' field from the database
                dropdown.appendChild(newOption);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            alert('Failed to fetch data. Please try again later.');
        });
}

// Use the function to populate dropdowns on page load
document.addEventListener('DOMContentLoaded', () => {
    populateDropdown('getDropDown.php', 'consultation_type', 'consultation_type'); // Populate Dropdown 1
    populateDropdown('getDropDown.php', 'doctor_name', 'doctor_name'); // Populate Dropdown 2
});
