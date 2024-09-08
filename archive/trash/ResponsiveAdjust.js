document.addEventListener('DOMContentLoaded', function () {
    function toggleSensorInfoText() {
        const sensorInfoDivs = document.querySelectorAll('.sensor-info');
        sensorInfoDivs.forEach(sensorInfoDiv => {
            if (window.innerWidth <= 500) {
                sensorInfoDiv.textContent = '▶';
            }
        });
    }

    toggleSensorInfoText();
    window.addEventListener('resize', toggleSensorInfoText);
});
