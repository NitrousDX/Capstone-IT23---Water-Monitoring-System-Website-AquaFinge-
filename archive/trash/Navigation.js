function togglePanel() {
    const elements = ['.sidepanel', '.sidepanel-icons', '.sensor-icons', '.close-button'];
    elements.forEach(selector => document.querySelector(selector).classList.toggle('active'));

    document.querySelectorAll('.sensor-info').forEach(element => {
        element.classList.toggle('active');
    });
}

function closeSidePanel() {
    var close = document.querySelector(".close-button");
    close.classList.remove("#");
}

function homeClick() {
    window.location.href = "./";
}