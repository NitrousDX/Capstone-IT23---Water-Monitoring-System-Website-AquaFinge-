    var tempGauge = new JustGage({
        id: "temperature-gauge",
        value: 0,
        min: 0,
        max: 100,
        title: "Temperature",
        label: "Temperature"
    });

    var tdsGauge = new JustGage({
        id: "tds-gauge",
        value: 0,
        min: 0,
        max: 1000,
        title: "TDS",
        label: "TDS",
    });

    var phGauge = new JustGage({
        id: "ph-gauge",
        value: 0,
        min: 0,
        max: 14,
        title: "Potential of Hydrogen",
        label: "pH"
    });

    function fetchSensorData() {
        fetch('data.php?' + new Date().getTime())
            .then(response => response.json())
            .then(data => {
                tempGauge.refresh(data.temperature);
                tdsGauge.refresh(data.tds);
                phGauge.refresh(data.ph);
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    setInterval(fetchSensorData, 1000);
    fetchSensorData();