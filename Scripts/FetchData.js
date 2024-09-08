function fetchSensorData() {
    fetch('data.php?' + new Date().getTime())
        .then(response => response.json())
        .then(data => {
            document.getElementById('temperature').innerHTML = `${data.temperature}`;
            document.getElementById('tds').innerHTML = `${data.tds}`;
            document.getElementById('ph').innerHTML = `${data.ph}`;
            // updateGauge(data.temperature);
        })
        .catch(error => console.error('Error fetching data:', error));
}
setInterval(fetchSensorData, 1000);
fetchSensorData();