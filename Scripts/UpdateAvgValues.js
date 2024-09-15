function fetchDataAndUpdate() {
    fetch('AverageCounters.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('avg-temp').textContent = data.temp;
            document.getElementById('avg-tds').textContent = data.tds;
            document.getElementById('avg-ph').textContent = data.ph;
        })
        .catch(error => console.error('Error fetching data:', error));
}

fetchDataAndUpdate();
setInterval(fetchDataAndUpdate, 1000);