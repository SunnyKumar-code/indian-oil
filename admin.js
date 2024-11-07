function search() {
    const searchType = document.getElementById("searchType").value;
    const searchInput = document.getElementById("searchInput").value;

    // Assuming you have a backend PHP file (search.php)
    const apiUrl = `search.php?searchType=${searchType}&code=${searchInput}`;

    // You can use Fetch API or any other library to make a request to the backend
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => displayResults(data))
        .catch(error => console.error('Error:', error));
}

function displayResults(results) {
    const resultContainer = document.getElementById("resultContainer");
    resultContainer.innerHTML = "";

    // Display the results in the resultContainer
    // You can format and style the results as needed
    for (const result of results) {
        const resultElement = document.createElement("div");
        resultElement.textContent = JSON.stringify(result);
        resultContainer.appendChild(resultElement);
    }
}
