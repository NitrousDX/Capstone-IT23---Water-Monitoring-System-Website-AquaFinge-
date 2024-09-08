async function connectionStatus() {
    try {
        const response = await fetch('/sensor_data/esp32comms/get_data.php');
        const conIndicator = document.getElementById('connection-visual');

        if (response.ok) {
            conIndicator.innerHTML = "Data Received!";
            conIndicator.classList.add('active');
        } else {
            conIndicator.innerHTML = "Reading Data...";
            conIndicator.classList.remove('active');
        }
    } catch (error) {
        console.error('Error:', error);
        const conIndicator = document.getElementById('connection-status');
        conIndicator.innerHTML = "Disconnected";
        conIndicator.classList.remove('active');
    }
}

setInterval(connectionStatus, 5000);