async function fetchTurbidity() {
    try {
        const response = await fetch('/sensor_data/esp32comms/get_data.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        console.log('Fetched data:', data);

        if (data && typeof data.turb === 'number') {
            const turbidityRound = Math.round(data.turb);
            document.getElementById('turbidity').textContent = ` ${turbidityRound}`;
            return turbidityRound;
        } else {
            console.error('Invalid data format:', data);
            document.getElementById('turbidity').textContent = '--';
            return null;
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        document.getElementById('turbidity').textContent = '--';
        return null;
    }
}

async function updateTurbidityIndicator() {
    let turb = await fetchTurbidity();
    let indicator = document.getElementById('turb-indicator');
    if (turb > 0) {
        indicator.classList.add('active');
    } else {
        indicator.classList.remove('active');
    }
}

function updateTurbidityGauge(value) {
    value = Math.max(0, Math.min(100, value));
    $('#turbidityGauge').gaugeMeter({
        percent: value,
        append: 'NTU'
    });
}

async function updateTurbiditySensorGauge() {
    const turbidityValue = await fetchTurbidity();
    if (turbidityValue !== null) {
        updateTurbidityGauge(turbidityValue);
    }
}

updateTurbidityGauge();
updateTurbiditySensorGauge();
updateTurbidityIndicator();
setInterval(updateTurbiditySensorGauge, 5000);
