




//landing page <a> scroll Script
function scrollToDiv(event, id) {
    event.preventDefault(); // Prevent the default anchor behavior
    const element = document.getElementById(id);
    if (element) {
        const offset = 200; // Adjust this value to control the scroll offset
        const elementPosition =
            element.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - offset;
        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth",
        });
    }
}
