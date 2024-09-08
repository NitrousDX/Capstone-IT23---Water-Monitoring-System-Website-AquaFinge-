async function fetchTds() {
    try {
        const response = await fetch('/sensor_data/esp32comms/get_data.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        if (data && typeof data.tds === 'number') {
            return Math.round(data.tds);
        } else {
            console.error('Invalid data format:', data);
            return null;
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        return null;
    }
}

function updateTdsIndicator(tds) {
    let indicator = document.getElementById('tds-indicator');
    if (tds > 0) {
        indicator.classList.add('active');
    } else {
        indicator.classList.remove('active');
    }
}

function updateTdsGauge(value) {
    value = Math.max(0, Math.min(100, value));
    $('#tdsGauge').gaugeMeter({
        percent: value,
        append: '×10'
    });
}

async function updateTdsData() {
    const tds = await fetchTds();
    if (tds !== null) {
        document.getElementById('tds').textContent = ` ${tds*10}`;
        updateTdsIndicator(tds);
        updateTdsGauge(tds);
    } else {
        document.getElementById('tds').textContent = '--';
    }
}

// Initialize the gauge with a default value
updateTdsGauge(0);

// Start updating data
updateTdsData();
setInterval(updateTdsData, 5000);


// async function fetchAnalogTds() {
//     try {
//         const response = await fetch('/sensor_data/esp32comms/get_data.php');
//         if (!response.ok) {
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//         const data = await response.json();
//         console.log('Fetched data:', data);
//         if (data && typeof data.tdsanalog === 'number') {
//             const tdsanalog = data.tdsanalog.toFixed(2);
//             let tdsAnalogRound = Math.round(tdsanalog);
//             document.getElementById('tds-analog').textContent = ` ${tdsAnalogRound}`;
//             return tdsAnalogRound;
//         } else {
//             console.error('Invalid data format:', data);
//             document.getElementById('tds-analog').textContent = '--';
//             return null;
//         }
//     } catch (error) {
//         console.error('Error fetching data:', error);
//         document.getElementById('tds-analog').textContent = '--';
//         return null;
//     }
// }

// async function fetchVoltageTds() {
//     try {
//         const response = await fetch('/sensor_data/esp32comms/get_data.php');
//         if (!response.ok) {
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//         const data = await response.json();
//         console.log('Fetched data:', data);
//         if (data && typeof data.tdsvolts === 'number') {
//             const tdsvolts = data.tdsvolts.toFixed(2);
//             let tdsVoltsRound = Math.round(tdsvolts);
//             document.getElementById('tds-volts').textContent = ` ${tdsVoltsRound}`;
//             return tdsVoltsRound;
//         } else {
//             console.error('Invalid data format:', data);
//             document.getElementById('tds-volts').textContent = '--';
//             return null;
//         }
//     } catch (error) {
//         console.error('Error fetching data:', error);
//         document.getElementById('tds-volts').textContent = '--';
//         return null;
//     }
// }
