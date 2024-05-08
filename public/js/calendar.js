// calendar.js
document.addEventListener("DOMContentLoaded", function () {
    const weekLabel = document.getElementById("weekLabel");
    const headerDays = document.getElementById("headerDays");
    const timeColumns = document.getElementById("timeColumns");
    const prevWeek = document.getElementById("prevWeek");
    const nextWeek = document.getElementById("nextWeek");

    let currentWeekStart = new Date();

    function setupCalendar() {
        currentWeekStart = new Date(
            currentWeekStart.setDate(
                currentWeekStart.getDate() - currentWeekStart.getDay() + 1
            )
        );

        weekLabel.textContent = `${currentWeekStart.toLocaleDateString()} - ${new Date(
            currentWeekStart.getTime() + 6 * 86400000
        ).toLocaleDateString()}`;

        headerDays.innerHTML = "";
        timeColumns.innerHTML = "";

        let timeColumn = `<div class="flex flex-col">`;
        for (let hour = 0; hour < 24; hour++) {
            timeColumn += `<div class="border-b py-2 border hover:bg-gray-100">${hour}:00</div>`;
        }

        for (let i = 0; i < 7; i++) {
            const day = new Date(currentWeekStart.getTime() + i * 86400000);
            headerDays.innerHTML += `<div class="text-center py-2">${day.toLocaleDateString()}</div>`;
        }

        timeColumn += `</div>`;
        timeColumns.innerHTML += timeColumn;
    }

    prevWeek.addEventListener("click", () => {
        currentWeekStart.setDate(currentWeekStart.getDate() - 7);
        setupCalendar();
    });

    nextWeek.addEventListener("click", () => {
        currentWeekStart.setDate(currentWeekStart.getDate() + 7);
        setupCalendar();
    });

    setupCalendar();
});
