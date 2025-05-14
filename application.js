document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.apply-section form');
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');
    const messageInput = form.querySelector('textarea[name="message"]');
    const submitButton = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate Name
        if (nameInput.value.trim() === '') {
            alert('Please enter your name.');
            nameInput.focus();
            return;
        }

        // Validate Email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(emailInput.value)) {
            alert('Please enter a valid email address.');
            emailInput.focus();
            return;
        }

        // Validate Message
        if (messageInput.value.trim() === '') {
            alert('Please enter your message.');
            messageInput.focus();
            return;
        }

        // Disable the submit button to prevent multiple submissions
        submitButton.disabled = true;

        // Create an AJAX request to submit the form data
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'submit_application.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Prepare the form data to be sent
        const formData = `name=${encodeURIComponent(nameInput.value)}&email=${encodeURIComponent(emailInput.value)}&message=${encodeURIComponent(messageInput.value)}`;

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the server
                alert(xhr.responseText);
                form.reset(); // Clear the form
                submitButton.disabled = false; // Re-enable the submit button
            } else if (xhr.readyState === 4) {
                // Handle error case
                alert('There was an error submitting your application. Please try again.');
                submitButton.disabled = false; // Re-enable the submit button
            }
        };

        // Send the form data
        xhr.send(formData);
    });
});
