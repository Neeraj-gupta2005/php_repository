// Check if the message div exists
window.onload = function() {
    const messageDiv = document.getElementById('message');
    console.log("function starting ");
    if (messageDiv) {
        console.log("Message div found, starting timer...");
        // Set a timer to remove the message after 2 seconds (2000 milliseconds)
        setTimeout(() => {
            console.log("timeout function start");
            messageDiv.style.display = 'none'; // Hide the message div
        }, 2000); // Change to 3000 for 3 seconds
        console.log("timout function ends.");
    }
};
