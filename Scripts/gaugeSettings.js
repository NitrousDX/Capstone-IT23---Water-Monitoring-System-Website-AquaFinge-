async function saveGaugeSettings() {
  const tempMin = document.getElementById('tempMin').value;
  const tempMax = document.getElementById('tempMax').value;
  const phMin = document.getElementById('phMin').value;
  const phMax = document.getElementById('phMax').value;
  const tdsMin = document.getElementById('tdsMin').value;
  const tdsMax = document.getElementById('tdsMax').value;

  try {
      const response = await fetch('save_settings.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
          },
          body: JSON.stringify({
              deviceSerial: "<?php echo $dev; ?>", // Assuming $dev is set in PHP
              tempMin,
              tempMax,
              phMin,
              phMax,
              tdsMin,
              tdsMax,
          }),
      });

      if (!response.ok) {
          throw new Error('Failed to save settings');
      }

      alert('Settings saved successfully!');
  } catch (error) {
      console.error('Error saving settings:', error);
  }
}
