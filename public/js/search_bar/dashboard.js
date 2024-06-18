document.addEventListener('DOMContentLoaded', (event) => {
    if (window.laravelData) {
        const laravelData = window.laravelData;
        console.log(laravelData);
        // Now you can use the JSON data stored in the variable
        // Example:
        console.log(laravelData.key1);
    }
});