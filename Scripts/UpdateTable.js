async function updateTempTable() {
    try {
        const response = await fetch('table.php');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();

        const tableBody = document.getElementById('temp-table-body');
        tableBody.innerHTML = '';

        data.forEach(row => {
            const newRow = document.createElement('tr');
            newRow.classList.add('table-results');

            newRow.innerHTML = `
            <td>${row.temperature}</td>
            <td>${row.timestamp}</td>
        `;

            tableBody.appendChild(newRow);
        });
    } catch (error) {
        console.error('Error updating table:', error);
    }
}

async function updateTDSTable() {
    try {
        const response = await fetch('table.php');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();

        const tableBody = document.getElementById('tds-table-body');
        tableBody.innerHTML = '';

        data.forEach(row => {
            const newRow = document.createElement('tr');
            newRow.classList.add('table-results');

            newRow.innerHTML = `
            <td>${row.tds}</td>
            <td>${row.timestamp}</td>
        `;

            tableBody.appendChild(newRow);
        });
    } catch (error) {
        console.error('Error updating table:', error);
    }
}

async function updatePHTable() {
    try {
        const response = await fetch('table.php');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();

        const tableBody = document.getElementById('ph-table-body');
        tableBody.innerHTML = '';

        data.forEach(row => {
            const newRow = document.createElement('tr');
            newRow.classList.add('table-results');

            newRow.innerHTML = `
            <td>${row.ph}</td>
            <td>${row.timestamp}</td>
        `;

            tableBody.appendChild(newRow);
        });
    } catch (error) {
        console.error('Error updating table:', error);
    }
}

updateTempTable();
updateTDSTable();
updatePHTable();
setInterval(updateTempTable, 1000);
setInterval(updateTDSTable, 1000);
setInterval(updatePHTable, 1000);