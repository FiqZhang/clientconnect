
    $(document).ready(function () {
        // Check if the success message container exists
        if ($('#success-message').length) {
            // Display the message
            $('#success-message').fadeIn();

            // Auto-hide after 3 seconds (optional)
            setTimeout(function () {
                $('#success-message').fadeOut();
            }, 3000);
        }
    });

