




//landing page <a> scroll Script (with alittle pixels above the slelected div)
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



// Get the toggle button and the mobile menu
const toggleButton = document.getElementById('mobile-menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');

// Add a click event listener to the toggle button
toggleButton.addEventListener('click', () => {
    // Toggle the 'hidden' class to show/hide the mobile menu
    mobileMenu.classList.toggle('hidden');
});




//Landing Page scroll Up Button
document.addEventListener("DOMContentLoaded", function() {
    const scrollTopBtn = document.getElementById("scrollTopBtn");

    // Show button when page is scrolled more than 500px
    window.onscroll = function() {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            scrollTopBtn.classList.remove("hidden");
        } else {
            scrollTopBtn.classList.add("hidden");
        }
    };

    // Scroll to top when button is clicked
    scrollTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});
