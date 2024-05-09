document.addEventListener("DOMContentLoaded", function() {
    var calendarEl = document.getElementById("calendar");
    const id = calendarEl.getAttribute('data-id');;
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        editable: true,
        selectable: true,
        locale: "ar",
        direction: "rtl",
        timeZone: "UTC",
        events: function(fetchInfo, successCallback, failureCallback) {
            fetch(`/api/${id}/tasks`) // Adjust the URL to match your Laravel route
                .then((response) => response.json())
                .then((events) => {
                    // Add colors based on priority to each event
                    // console.log(events);
                    events.forEach((event) => {
                        const priority = event.priority;
                        let color;

                        switch (priority) {
                            case "high":
                                color = "red";
                                break;
                            case "medium":
                                color = "orange";
                                break;
                            case "low":
                                color = "green";
                                break;
                            default:
                                color =
                                "blue"; // Default color if priority is not set
                        }

                        event.backgroundColor = color;
                        event.borderColor = color;
                    });
                    successCallback(events);
                })
                .catch((error) => failureCallback(error));
        },
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        buttonText: {
            today: "اليوم",
            month: "شهر",
            week: "أسبوع",
            day: "يوم",
            list: "قائمة",
        },
        // Handle event changes (update)
        eventChange: function(info) {
            var eventData = {
                title: info.event.title,
                start: info.event.start.toISOString(),
                end: info.event.end ? info.event.end.toISOString() : null,
            };

            // console.log(eventData);
            fetch(`/api/${id}/tasks/${info.event.id}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(eventData),
            });
        },
        // Handle new event creation
        select: function(info) {
            var title = prompt("Enter a title for the event:");
            if (title) {
                var eventData = {
                    title: title,
                    start: info.startStr,
                    end: info.endStr,
                };
                // console.log(eventData);

                fetch(`/api/${id}/tasks`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            Authorization: "Bearer " + localStorage.getItem(
                            "authToken"), // Include the token from localStorage
                        },
                        body: JSON.stringify(eventData),
                    })
                    .then((response) => response.json())
                    .then((newEvent) => {
                        // console.log("New Event:", newEvent);
                        calendar.addEvent(newEvent);
                    })
                    .catch((error) => console.error("Error:", error));

            }
        },
        // Handle event deletion
        eventClick: function(info) {
            if (confirm("Are you sure you want to delete this event?")) {
                fetch(`/api/${id}/tasks/${info.event.id}`, {
                    method: "DELETE",
                }).then(() => {
                    info.event.remove();
                });
            }
        },
        eventDidMount: function(info) {
            applyPriorityColor(info.event);
        },
        viewDidMount: function() {
            applyTailwindClasses();
        },
    });

    function applyPriorityColor(event) {
        const priority = event.extendedProps.priority;
        let color;

        switch (priority) {
            case "high":
                color = "red";
                break;
            case "medium":
                color = "orange";
                break;
            case "low":
                color = "green";
                break;
            default:
                color = "blue"; // Default color if priority is not set
        }

        event.setProp("backgroundColor", color);
        event.setProp("borderColor", color);
    }

    function applyTailwindClasses() {
        document.querySelectorAll(".fc-button").forEach((button) => {
            button.className = "";
            button.classList.add(
                "bg-adel-Dark",
                "text-white",
                "hover:bg-adel-Normal",
                "px-4",
                "py-2",
                "rounded-lg",
                "focus:outline-none",
                "focus:ring-2",
                "focus:ring-blue-300",
                "mx-1"
            );
        });
    }

    calendar.render();
});

function applyPriorityColor(event) {
    console.log(event);
    const priority = event.extendedProps.priority;
    console.log(priority);
    let color;

    switch (priority) {
        case "high":
            color = "red";
            break;
        case "medium":
            color = "orange";
            break;
        case "low":
            color = "green";
            break;
        default:
            color = "blue"; // Default color if priority is not set
    }

    event.setProp("backgroundColor", color);
    event.setProp("borderColor", color);
}

function applyTailwindClasses() {
    document.querySelectorAll(".fc-button").forEach(function(button) {
        // Clear all existing class names (excluding `.fc-button`)
        button.className = "";

        // Apply TailwindCSS classes
        button.classList.add(
            "bg-adel-Dark",
            "text-white",
            "hover:bg-adel-Normal",
            "px-4",
            "py-2",
            "rounded-lg",
            "focus:outline-none",
            "focus:ring-2",
            "focus:ring-blue-300",
            "mx-1"
        );
    });
}