async function fetchTemperature() {
    try {
        const response = await fetch('/sensor_data/esp32comms/get_data.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        if (data && typeof data.temperature === 'number') {
            const temperature = data.temperature.toFixed(2);
            let tempRound = Math.round(temperature);
            document.getElementById('temperature').textContent = ` ${tempRound}`;
            return tempRound;
        } else {
            console.error('Invalid data format:', data);
            document.getElementById('temperature').textContent = '--';
            return null;
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('temperature').textContent = '--';
        return null;
    }
}

async function updateTempIndicator() {
    let temp = await fetchTemperature();
    let indicator = document.getElementById('temp-indicator');
    console.log(temp); //pang check lang if meron value.
    if (temp > 0) {
        indicator.classList.add('active');
    } else {
        indicator.classList.remove('active');
    }
}

async function fetchTds() {
    try {
        const response = await fetch('/sensor_data/esp32comms/get_data.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        console.log('Fetched data:', data);
        if (data && typeof data.tds === 'number') {
            const tds = data.tds.toFixed(2);
            let tdsRound = Math.round(tds);
            document.getElementById('tds').textContent = ` ${tdsRound}`;
            return tdsRound;
        } else {
            console.error('Invalid data format:', data);
            document.getElementById('tds').textContent = '--';
            return null;
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('tds').textContent = '--';
        return null;
    }
}

async function updateTdsIndicator() {
    let tds = await fetchTds();
    let indicator = document.getElementById('tds-indicator');
    console.log(tds); //pang check lang if meron value.
    if (tds > 0) {
        indicator.classList.add('active');
    } else {
        indicator.classList.remove('active');
    }
}

setInterval(updateTempIndicator, 5000); 
setInterval(updateTdsIndicator, 5000); 
