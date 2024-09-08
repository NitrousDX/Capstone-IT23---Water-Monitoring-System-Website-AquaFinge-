<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Display</title>
    <script>
        async function fetchTemperature() {
            try {
                const response = await fetch('/sensor_data/get_data.php');
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                const data = await response.json();

                if (data && typeof data.temperature === 'number') {
                    const temperature = data.temperature.toFixed(2);
                    document.getElementById('temperature').textContent = `Temperature: ${temperature}`;
                } else {
                    console.error('Invalid data format:', data);
                    document.getElementById('temperature').textContent = 'Temperature: --';
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                document.getElementById('temperature').textContent = 'Temperature: --';
            }
        }

        //TDS Fetch Code:
        async function fetchTDS() {
            try {
                const response = await fetch('/sensor_data/get_data.php');
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                const data = await response.json();

                if (data && typeof data.tds === 'number') {
                    const tds = data.tds.toFixed(2);
                    document.getElementById('tds').textContent = `TDS: ${tds}`;
                } else {
                    console.error('Invalid data format:', data);
                    document.getElementById('tds').textContent = 'TDS: --';
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                document.getElementById('tds').textContent = 'TDS: --';
            }
        }

        //Turbidity Fetch Code:
        async function fetchTurbidity() {
            try {
                const response = await fetch('/sensor_data/get_data.php');
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                const data = await response.json();

                if (data && typeof data.turb === 'number') {
                    const turb = data.turb.toFixed(2);
                    document.getElementById('turb').textContent = `Turbidity Value: ${turb}`;
                } else {
                    console.error('Invalid data format:', data);
                    document.getElementById('turb').textContent = 'Turbidity Value: --';
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                document.getElementById('turb').textContent = 'Turbidity Value: --';
            }
        }


        //refresh yung page every 5 seconds

        setInterval(fetchTemperature, 5000);
        window.onload = fetchTemperature;
        
        setInterval(fetchTDS, 5000); 
        window.onload = fetchTDS;

        setInterval(fetchTurbidity, 5000); 
        window.onload = fetchTurbidity;
    </script>
</head>
<body>
    <h1 id="temperature">Temperature: --</h1>
    <h1 id="tds">TDS: --</h1>
    <h1 id="turb">Turbidity Value: --</h1>
</body>
</html>
