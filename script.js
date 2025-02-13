function validateForm() {
    const email = document.getElementById('email').value;
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorMessage = document.getElementById('error-message');

    if (password !== confirmPassword) {
        errorMessage.textContent = "Password and Confirm Password must be the same.";
        return false;
    }

    // Save data to local storage
    localStorage.setItem('userData', JSON.stringify({ email, username, password }));

    errorMessage.textContent = ""; // Clear any previous error message
    alert("Form submitted successfully!"); // Simulate form submission
    return true; // Allow form submission
}