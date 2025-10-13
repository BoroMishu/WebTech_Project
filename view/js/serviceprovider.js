// Refresh upcoming events dynamically using AJAX
document.addEventListener("DOMContentLoaded", function() {
    const refreshBtn = document.getElementById("refreshEvents");
    const eventTableBody = document.getElementById("eventTable");

    refreshBtn.addEventListener("click", function() {
        fetch("../view/fetch_upcoming_events.php")
        .then(response => response.text())
        .then(data => {
            eventTableBody.innerHTML = data;
        })
        .catch(error => {
            console.error("Error fetching events:", error);
        });
    });
});
