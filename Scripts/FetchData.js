function fetchData() {
    fetch('sensor_process.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('temperature').textContent = data.temperature;
            document.getElementById('tds').textContent = data.tds;
            document.getElementById('ph').textContent = data.ph;
        })
        .catch(error => console.error('Error fetching data:', error));
}

setInterval(fetchData, 30000);
fetchData();