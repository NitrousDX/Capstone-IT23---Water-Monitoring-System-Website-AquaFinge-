function updateAmmoniaGauge(value) {
    value = Math.max(0, Math.min(100, value));
    $('#ammoniaGauge').gaugeMeter({
        percent: value,
    });
}