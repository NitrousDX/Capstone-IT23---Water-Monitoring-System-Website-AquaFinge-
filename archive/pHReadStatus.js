async function fetchPh() {
    try {
        const response = await fetch('/sensor_data/esp32comms/get_data.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        if (data && typeof data.ph === 'number') {
            return data.ph;
        } else {
            console.error('Invalid data format:', data);
            return null;
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        return null;
    }
}

function updatePhIndicator(ph) {
    let indicator = document.getElementById('ph-indicator');
    if (ph > 0) {
        indicator.classList.add('active');
    } else {
        indicator.classList.remove('active');
    }
}

function updatePhGauge(value) {
    value = Math.max(0, Math.min(100, value));
    $('#phGauge').gaugeMeter({
        percent: value,
        append: 'pH'
    });
}

async function updatePhData() {
    const ph = await fetchPh();
    if (ph !== null) {
        const phFormatted = ph.toFixed(2);
        document.getElementById('ph').textContent = ` ${phFormatted}`;
        updatePhGauge(ph);
        updatePhIndicator(ph);
    } else {
        document.getElementById('ph').textContent = '--';
    }
}

updatePhGauge(7);

updatePhData();
setInterval(updatePhData, 5000);
