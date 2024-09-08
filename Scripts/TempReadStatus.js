async function fetchTemperature() {
    try {
        const response = await fetch('/AquaFinge/sensor_device_fetch_data.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        if (data && typeof data.temperature === 'number') {
            return Math.round(data.temperature);
        } else {
            console.error('Invalid data format:', data);
            return null;
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        return null;
    }
}

function updateTempIndicator(temp) {
    let indicator = document.getElementById('temp-indicator');
    if (temp > 0) {
        indicator.classList.add('active');
    } else {
        indicator.classList.remove('active');
    }
}

function updateTempGauge(value) {
    value = Math.max(0, Math.min(100, value));
    $('#tempGauge').gaugeMeter({
        percent: value,
        append: '°C'
    });
}

async function updateTemperatureData() {
    const temp = await fetchTemperature();
    if (temp !== null) {
        document.getElementById('temperature').textContent = ` ${temp}`;
        updateTempIndicator(temp);
        updateTempGauge(temp);
    } else {
        document.getElementById('temperature').textContent = '--';
    }
}

// Initialize with a reasonable default value
updateTempGauge(25);

// Start updating data
updateTemperatureData();
setInterval(updateTemperatureData, 5000);


// async function fetchAnalogTemperature() {
//     try {
//         const response = await fetch('/sensor_data/esp32comms/get_data.php');
//         if (!response.ok) {
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//         const data = await response.json();
//         console.log('Fetched data:', data);
//         if (data && typeof data.tempanalog === 'number') {
//             const tempanalog = data.tempanalog.toFixed(2);
//             let tempAnalogRound = Math.round(tempanalog);
//             document.getElementById('temp-analog').textContent = ` ${tempAnalogRound}`;
//             return tempAnalogRound;
//         } else {
//             console.error('Invalid data format:', data);
//             document.getElementById('temp-analog').textContent = '--';
//             return null;
//         }
//     } catch (error) {
//         console.error('Error fetching data:', error);
//         document.getElementById('temp-analog').textContent = '--';
//         return null;
//     }
// }

// async function fetchVoltageTemperature() {
//     try {
//         const response = await fetch('/sensor_data/esp32comms/get_data.php');
//         if (!response.ok) {
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//         const data = await response.json();
//         console.log('Fetched data:', data);
//         if (data && typeof data.tempvolts === 'number') {
//             const tempvolts = data.tempvolts.toFixed(2);
//             let tempVoltsRound = Math.round(tempvolts);
//             document.getElementById('temp-volts').textContent = ` ${tempVoltsRound}`;
//             return tempVoltsRound;
//         } else {
//             console.error('Invalid data format:', data);
//             document.getElementById('temp-volts').textContent = '--';
//             return null;
//         }
//     } catch (error) {
//         console.error('Error fetching data:', error);
//         document.getElementById('temp-volts').textContent = '--';
//         return null;
//     }
// }


// fetchAnalogTemperature();
// fetchVoltageTemperature();
